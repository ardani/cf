@extends('layouts.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Penjualan Barang</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Data Penjualan Barang
                        </div>
                        <div class="card-block">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <a href="{{url('barang/import')}}" class="btn btn-primary" style="margin-bottom: 10px">Import Data</a>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>No Faktur</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($barangs as $barang)
                                    <tr>
                                        <td>{{$barang->no_faktur}}</td>
                                        <td>{{$barang->kode_barang}}</td>
                                        <td>{{$barang->nama_barang}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $barangs->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection