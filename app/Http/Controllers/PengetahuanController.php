<?php

namespace App\Http\Controllers;

use App\Gejala;
use App\Pengetahuan;
use App\Penyakit;
use Illuminate\Http\Request;

class PengetahuanController extends Controller
{
    private $pengetahuan;
    private $penyakit;
    private $gejala;
    public function __construct(Pengetahuan $pengetahuan, Penyakit $penyakit, Gejala $gejala)
    {
        $this->middleware('auth');
        $this->pengetahuan = $pengetahuan;
        $this->penyakit = $penyakit;
        $this->gejala = $gejala;
    }

    public function index(Request $request)
    {
        $pengetahuans = $this->pengetahuan->where('kode_penyakit', $request->kode_penyakit)->get();
        $data = [
            'pengetahuans' => $pengetahuans->keyBy('kode_gejala')->toArray(),
            'penyakits' => $this->penyakit->get(),
            'gejalas' => $this->gejala->get()
        ];
        return view('pages.pengetahuan.index', $data);
    }

    public function store(Request $request)
    {
        $kode_penyakit = $request->kode_penyakit;
        if (!$kode_penyakit) {
            return redirect()->back()->withErrors(['msg', 'Penyakit belum dipilih']);
        }
        $kode_gejalas = $request->kode_gejala;
        $this->pengetahuan->where('kode_penyakit', $kode_penyakit)->delete();
        $params = [];
        foreach ($kode_gejalas as $key => $kode_gejala) {
            $params[] = [
                'kode_penyakit' => $kode_penyakit,
                'kode_gejala' => $kode_gejala,
                'mb' => $request->mb[$kode_gejala],
                'md' => $request->md[$kode_gejala],
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d')
            ];
        }
        $this->pengetahuan->insert($params);
        return redirect('pengetahuan?kode_penyakit='.$kode_penyakit);
    }
}
