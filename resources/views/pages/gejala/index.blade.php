@extends('layouts.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Gejala</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Data Gejala
                        </div>
                        <div class="card-block">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <a href="{{url('gejala/create')}}" class="btn btn-primary" style="margin-bottom: 10px">Tambah Gejala</a>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th width="15%">Nama Gejala</th>
                                    <th>Pertanyaan</th>
                                    <th width="40%">Deskripsi</th>
                                    <th>Image</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($gejalas as $gejala)
                                    <tr>
                                        <td>{{$gejala->kode_gejala}}</td>
                                        <td>{{$gejala->pertanyaan}}</td>
                                        <td>{{$gejala->nama_gejala}}</td>
                                        <td>{{$gejala->desc}}</td>
                                        <td><img width="200" src="{{asset($gejala->image ? 'storage/'.$gejala->image : 'img/default-placeholder.png')}}" alt=""/></td>
                                        <td>
                                            <a href="{{url('gejala/' .$gejala->kode_gejala.'/edit')}}"><i class="fa fa-pencil"></i> edit</a>
                                            <a href="{{url('gejala/' .$gejala->kode_gejala.'/delete')}}" class="act-delete"><i class="fa fa-remove"></i> delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $gejalas->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection