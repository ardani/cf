<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    private $option;
    public function __construct(Option $option)
    {
        $this->middleware('auth');
        $this->option = $option;
    }

    public function index()
    {
        $data['options'] = $this->option->orderBy('order')->paginate(30);
        return view('pages.option.index', $data);
    }

    public function create()
    {
        return view('pages.option.create');
    }

    public function store(Request $request)
    {
        $this->option->create([
            'nama' => $request->nama,
            'nilai' => $request->nilai,
            'order' => $request->order
        ]);
        return redirect('option')->with('status', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $option = $this->option->find($id);
        return view('pages.option.edit', ['option' => $option]);
    }

    public function update(Request $request, $id)
    {
        $option = $this->option->find($id);
        $option->nama = $request->nama;
        $option->nilai = $request->nilai;
        $option->order = $request->order;
        $option->save();
        return redirect('option')->with('status', 'Data Berhasil Diperbarui');
    }

    public function delete($id)
    {
        $this->option->find($id)->delete();
        return redirect()->back()->with('status', 'Data Berhasil Dihapus');
    }
}
