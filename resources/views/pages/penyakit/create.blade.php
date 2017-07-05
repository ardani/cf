@extends('layouts.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Penyakit</li>
        <li class="breadcrumb-item active">Tambah</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Tambah Data Penyakit
                        </div>
                        <form action="{{url('penyakit/create')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="card-block">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label">Nama Penyakit</label>
                                <div class="col-md-9">
                                    <input type="text" id="text-input" name="nama_penyakit" class="form-control">
                                    {{csrf_field()}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="textarea-input">Deskripsi</label>
                                <div class="col-md-9">
                                    <textarea id="textarea-input" name="desc" rows="9" class="form-control" placeholder="penjelasan"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="textarea-input">Solusi</label>
                                <div class="col-md-9">
                                    <textarea id="textarea-input" name="solusi" rows="9" class="form-control" placeholder="solusi"></textarea>
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