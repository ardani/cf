@extends('layouts.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Gejala</li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Tambah Data Gejala
                        </div>
                        <form action="{{url('gejala/create')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-block">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nama Gejala</label>
                                <div class="col-md-9">
                                    <input type="text" id="text-input" name="nama_gejala" class="form-control">
                                    {{csrf_field()}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Pertanyaan</label>
                                <div class="col-md-9">
                                    <input type="text" id="text-input" name="pertanyaan" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="textarea-input">Deskripsi</label>
                                <div class="col-md-9">
                                    <textarea id="textarea-input" name="desc" rows="9" class="form-control" placeholder="penjelasan"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="textarea-input">Jenis Pertanyaan</label>
                                <div class="col-md-9">
                                    <select name="tipe" class="form-control">
                                        <option value="1">Positif</option>
                                        <option value="0">Negatif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="file-input">Image</label>
                                <div class="col-md-9">
                                    <input type="file" id="file-input" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection