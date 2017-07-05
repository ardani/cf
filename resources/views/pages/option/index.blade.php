@extends('layouts.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Pilihan</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Data Pilihan
                        </div>
                        <div class="card-block">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <a href="{{url('option/create')}}" class="btn btn-primary" style="margin-bottom: 10px">Tambah Pilihan</a>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="15%">Nama Pilihan</th>
                                    <th width="25%">Nilai</th>
                                    <th width="25%">Order</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($options as $option)
                                    <tr>
                                        <td>{{$option->nama}}</td>
                                        <td>{{$option->nilai}}</td>
                                        <td>{{$option->order}}</td>
                                        <td>
                                            <a href="{{url('option/' .$option->id.'/edit')}}"><i class="fa fa-pencil"></i> edit</a>
                                            <a href="{{url('option/' .$option->id.'/delete')}}" class="act-delete"><i class="fa fa-remove"></i> delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $options->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection