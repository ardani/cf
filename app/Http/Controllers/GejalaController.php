<?php

namespace App\Http\Controllers;
use App\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    private $gejala;
    public function __construct(Gejala $gejala)
    {
        $this->middleware('auth');
        $this->gejala = $gejala;
    }

    public function index()
    {
        $data['gejalas'] = $this->gejala->paginate(10);
        return view('pages.gejala.index', $data);
    }

    public function create()
    {
        return view('pages.gejala.create');
    }

    public function store(Request $request)
    {
        $path = '';
        if ($request->hasFile('image')) {
            $path = $request->image->store('images');
        }
        $this->gejala->create([
            'kode_gejala' => autonumber('gejala', 'kode_gejala', 'G'),
            'image' => $path,
            'nama_gejala' => $request->nama_gejala,
            'desc' => $request->desc,
            'pertanyaan' => $request->pertanyaan
        ]);
        return redirect('gejala')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $gejala = $this->gejala->find($id);
        return view('pages.gejala.edit', ['gejala' => $gejala, 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $gejala = $this->gejala->find($id);
        if ($request->hasFile('image')) {
            $path = $request->image->store('images');
            $gejala->path = $path;
        }

        $gejala->nama_gejala = $request->nama_gejala;
        $gejala->desc = $request->desc;
        $gejala->pertanyaan = $request->pertanyaan;
        $gejala->save();
        return redirect('gejala')->with('status', 'Data Berhasil Diperbarui');
    }

    public function delete($id)
    {
        $this->gejala->find($id)->delete();
        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}
