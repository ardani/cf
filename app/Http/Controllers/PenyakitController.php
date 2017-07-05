<?php

namespace App\Http\Controllers;


use App\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    private $penyakit;
    public function __construct(Penyakit $penyakit)
    {
        $this->middleware('auth');
        $this->penyakit = $penyakit;
    }

    public function index()
    {
        $data['penyakits'] = $this->penyakit->paginate(30);
        return view('pages.penyakit.index', $data);
    }

    public function create()
    {
        return view('pages.penyakit.create');
    }

    public function store(Request $request)
    {
        $path = '';
        if ($request->hasFile('image')) {
            $path = $request->image->store('images');
        }
        $this->penyakit->create([
            'kode_penyakit' => autonumber('penyakit', 'kode_penyakit', 'P'),
            'image' => $path,
            'nama_penyakit' => $request->nama_penyakit,
            'desc' => $request->desc
        ]);
        return redirect('penyakit')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $penyakit = $this->penyakit->find($id);
        return view('pages.penyakit.edit', ['penyakit' => $penyakit]);
    }

    public function update(Request $request, $id)
    {
        $penyakit = $this->penyakit->find($id);
        if ($request->hasFile('image')) {
            $path = $request->image->store('images');
            $penyakit->path = $path;
        }

        $penyakit->nama_penyakit = $request->nama_penyakit;
        $penyakit->desc = $request->desc;
        $penyakit->save();
        return redirect('penyakit')->with('status', 'Data Berhasil Diperbarui');
    }

    public function delete($id)
    {
        $this->penyakit->find($id)->delete();
        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}
