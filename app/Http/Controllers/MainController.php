<?php

namespace App\Http\Controllers;

use App\Gejala;
use App\Option;
use App\Pengetahuan;
use App\Penyakit;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $gejalas;
    private $options;
    private $pengetahuan;
    private $penyakit;
    private $skip_rules;

    public function __construct(Gejala $gejala, Option $option, Pengetahuan $pengetahuan, Penyakit $penyakit)
    {
        $this->gejalas = $gejala;
        $this->options = $option;
        $this->pengetahuan = $pengetahuan;
        $this->penyakit = $penyakit;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // reset session data
        session(['yes_answer'=> []]);
        session(['no_answer'=> []]);
        session(['rules'=> []]);
        session(['rule_position' => 'P01']);
        session(['skip_rules' => []]);
        return view('pages.main');
    }

    public function getHasil()
    {
        $yes_key = collect(session('yes_answer'))->keys()->all();
        $no_key = collect(session('no_answer'))->keys()->all();
        $gejala_yes = $this->gejalas->whereIn('kode_gejala', $yes_key)->get();
        $gejala_no = $this->gejalas->whereIn('kode_gejala', $no_key)->get();
        $options = $this->options->get();
        $options = $options->keyBy('nilai')->all();
        $answers = array_merge(session('yes_answer'), session('no_answer'));
        $results = $this->perhitunganCF();
        $data = [
            'gejala_yes' => $gejala_yes,
            'gejala_no' => $gejala_no,
            'answers' => $answers,
            'results' => $results,
            'options' => $options
        ];
        return view('pages.hasil', $data);
    }

    public function getKonsultasi(Request $request)
    {
        $this->generateRule();
        // olah jawaban dari pertanyaan yang sudah dijawab
        $this->manageJawaban($request->gejala, $request->jawaban);
        $kode_gejala = $this->nextPertanyaan();

        // jika semua rule sudah selesai dijalankan, tampilkan hasil
        if (!$kode_gejala) {
            return redirect('hasil');
        } else {
            $gejala = $this->gejalas->find($kode_gejala);
        }

        $data = [
            'gejala' => $gejala,
            'options' => $this->options->get()
        ];

        return view('pages.konsultasi', $data);
    }

    private function manageJawaban($gejala, $hasil_jawaban)
    {
        $rules = session('rules');
        $rule_position = session('rule_position');
        if ($gejala) {
            if ($hasil_jawaban == -1) {
                $no_answer = array_merge(session('no_answer', []), [$gejala => $hasil_jawaban]);
                session(['no_answer' => $no_answer]);
                // hapus rule yang memiliki hasil jawaban -1 dari list rule
                $filtered = collect($rules)->filter(function ($value, $key) use ($gejala) {
                    if (in_array($gejala, $value)) {
                        $this->skip_rules[] = $key;
                    }
                    return !in_array($gejala, $value);
                });
                // update session rule
                session(['rules' => $filtered->all()]);
                $skip_rules = ($this->skip_rules) ?: [session('rule_position')];
                $skip_rules = array_merge(session('skip_rules'), $skip_rules);
                $this->skipRules($skip_rules);
            } else {
                // simpan jawaban yes ke session
                $yes_answer = array_merge(session('yes_answer', []), [$gejala => $hasil_jawaban]);
                session(['yes_answer' => $yes_answer]);
                $key_answer = collect($yes_answer)->keys()->all();
                // cek apakah semua pertanyaan rule sudah dijawab
                $all_have_answer = collect($rules[$rule_position])
                    ->diff($key_answer)
                    ->count();
                // jika sudah semua pertanyaan dijawab lakukan skip rule keberikutnya
                if ($all_have_answer == 0) {
                    $skip_rules = array_merge(session('skip_rules'), [session('rule_position')]);
                    $this->skipRules($skip_rules);
                }
            }
        }
    }

    private function skipRules($skip_rules)
    {
        $rules = session('rules');
        session(['skip_rules' => $skip_rules]);
        $rule_position = collect($rules)->filter(function ($value, $key) use ($skip_rules) {
            return !in_array($key, $skip_rules);
        })->keys()->sort();

        session(['rule_position' => $rule_position->first()]);
    }

    private function nextPertanyaan()
    {
        $rules = session('rules');
        $rule_position = session('rule_position');
        if (!array_key_exists($rule_position, $rules)) {
            return false;
        }
        // tampilkan pertanyaan yang belum dijawab
        $answer = collect(session('yes_answer', []))->keys()->all();
        $kode_gejala = collect($rules[$rule_position])
            ->diff($answer)
            ->sort()
            ->first();

        if (!$kode_gejala && (count(session('skip_rules')) <= $this->penyakit->count())) {
            $skip_rules = array_merge(session('skip_rules'), [session('rule_position')]);
            $this->skipRules($skip_rules);
            $kode_gejala = $this->nextPertanyaan();
        }

        return $kode_gejala;
    }

    private function perhitunganCF()
    {
        $rules = session('rules');
        $answer = array_merge(session('yes_answer'), session('no_answer'));
        $cfs = [];
        foreach ($rules as $rule => $gejalas) {
            foreach ($gejalas as $key => $gejala) {
                $data_gejala = $this->pengetahuan
                    ->where('kode_penyakit', $rule)
                    ->where('kode_gejala', $gejala)
                    ->first();

                $cfs[$rule][] = round(($data_gejala->mb - $data_gejala->md) * $answer[$gejala], 3);
            }
        }
        // perhitungan cf combine
        $CF_combine = [];
        foreach ($cfs as $rule => $cf) {
            $cf_old[$rule] = $this->CFCombine($cf[0], $cf[1]);
            foreach ($cf as $key => $value) {
                if ($key > 1) {
                    $cf_old[$rule] = $this->CFCombine($value, $cf_old[$rule]);
                }
            }

            $CF_combine[$rule] = [
                'nilai' => $cf_old[$rule],
                'data' => $this->penyakit->find($rule)
            ];
        }
        // urutkan berdasarkan nilai cf tertinggi
        $CF_combine = collect($CF_combine)->sortByDesc('nilai')->all();
        return $CF_combine;
    }

    private function CFCombine($cf1, $cf2)
    {
        if ($cf1 >= 0 && $cf2 >= 0) {
            return $this->CFpositif($cf1,$cf2);
        } else if ($cf1 < 0 && $cf2 < 0) {
            return $this->CFNegatif($cf1, $cf2);
        } else {
            return $this->CFPostifNegatif($cf1, $cf2);
        }
    }

    private function CFpositif($cf1, $cf2)
    {
        return $cf1 + ($cf2 * (1 - $cf1));
    }

    private function CFNegatif($cf1, $cf2)
    {
        return  $cf1 + ($cf2 * (1 + $cf1));
    }

    private function CFPostifNegatif($cf1, $cf2)
    {
        return ($cf1 + $cf2) / (1 - min(abs($cf1),abs($cf2)));
    }

    private function generateRule()
    {
        // ambil semua data rule
        $rules = [];
        $penyakits = $this->penyakit->get();
        foreach ($penyakits as $penyakit) {
            $rules[$penyakit->kode_penyakit] = $penyakit->pengetahuan()
                ->orderBy('kode_gejala')
                ->get(['kode_gejala'])
                ->pluck('kode_gejala')
                ->toArray();
        }

        if (empty(session('rules'))) {
            session(['rules' => $rules]);
        }
    }

    public function getPengetahuan(Request $request)
    {
        $penyakits = $this->penyakit->where(function ($query) use ($request){
            if ($request->kode_penyakit) {
                $query->where('kode_penyakit', $request->kode_penyakit);
            }
        })->get();
        $data = ['penyakits' => $penyakits];
        return view('pages.pengetahuan', $data);
    }
}
