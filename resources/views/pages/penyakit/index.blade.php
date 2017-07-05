@extends('layouts.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Penyakit</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Data Penyakit
                        </div>
                        <div class="card-block">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <a href="{{url('penyakit/create')}}" class="btn btn-primary" style="margin-bottom: 10px">Tambah Penyakit</a>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="15%">Nama Penyakit</th>
                                    <th width="25%">Deskripsi</th>
                                    <th width="25%">Solusi</th>
                                    <th>Image</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($penyakits as $penyakit)
                                    <tr>
                                        <td>{{$penyakit->kode_penyakit}}</td>
                                        <td>{{$penyakit->nama_penyakit}}</td>
                                        <td>{{$penyakit->desc}}</td>
                                        <td>{{$penyakit->solusi}}</td>
                                        <td><img width="200" src="{{asset($penyakit->image ?:'img/default-placeholder.png')}}" alt=""/></td>
                                        <td>
                                            <a href="{{url('penyakit/' .$penyakit->kode_penyakit.'/edit')}}"><i class="fa fa-pencil"></i> edit</a>
                                            <a href="{{url('penyakit/' .$penyakit->kode_penyakit.'/delete')}}" class="act-delete"><i class="fa fa-remove"></i> delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $penyakits->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection