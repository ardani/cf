@extends('layouts.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Pilihan</li>
        <li class="breadcrumb-item active">Ubah</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Ubah Data Pilihan
                        </div>
                        <form action="{{url('option/'.$option->id.'/edit')}}" method="post" class="form-horizontal">
                            <div class="card-block">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Nama Pilihan</label>
                                    <div class="col-md-9">
                                        <input type="text" id="text-input" name="nama" value="{{$option->nama}}" class="form-control">
                                        {{csrf_field()}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Nilai Pilihan</label>
                                    <div class="col-md-9">
                                        <input type="text" id="text-input" name="nilai" value="{{$option->nilai}}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label">Order Pilihan</label>
                                    <div class="col-md-9">
                                        <input type="number" id="text-input" name="order" value="{{$option->order}}" class="form-control">
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