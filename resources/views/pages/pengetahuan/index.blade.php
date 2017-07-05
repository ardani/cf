@extends('layouts.main')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Basis Pengetahuan</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Basis Pengetahuan
                        </div>
                        <div class="card-block">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-error">
                                    {{$errors->first()}}
                                </div>
                            @endif
                            <form method="get" class="form-horizontal">
                                <div class="form-group row">
                                    <label class="col-md-3 form-control-label" for="textarea-input">Penyakit</label>
                                    <div class="col-md-6">
                                        <select name="kode_penyakit" id="select-penyakit" class="form-control">
                                            <option value="">pilih penyakit</option>
                                            @foreach($penyakits  as $penyakit)
                                                @if($penyakit->kode_penyakit == request('kode_penyakit'))
                                                    <option selected value="{{$penyakit->kode_penyakit}}">{{$penyakit->nama_penyakit}}</option>
                                                @else
                                                    <option value="{{$penyakit->kode_penyakit}}">{{$penyakit->nama_penyakit}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-success">Pilih</button>
                                    </div>
                                </div>
                            </form>
                            <form method="post" action="{{url('pengetahuan/create')}}">
                            {{csrf_field()}}
                             <input type="hidden" name="kode_penyakit" value="{{request('kode_penyakit')}}">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Kode Gejala</th>
                                    <th>Gejala</th>
                                    <th>MB</th>
                                    <th>MD</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($gejalas as $gejala)
                                    <?php
                                      $checked = array_key_exists($gejala->kode_gejala, $pengetahuans);
                                      $mb = $checked ? $pengetahuans[$gejala->kode_gejala]['mb'] : 0;
                                      $md = $checked ? $pengetahuans[$gejala->kode_gejala]['md'] : 0;
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="checkbox">
                                                <label for="">
                                                    <input type="checkbox" {{$checked ? 'checked' : ''}} name="kode_gejala[]" value="{{$gejala->kode_gejala}}"/>
                                                    {{$gejala->kode_gejala}}
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{$gejala->nama_gejala}}</td>
                                        <td><input type="text" class="form-control" name="mb[]" value="{{$mb}}" placeholder="MB"></td>
                                        <td><input type="text" class="form-control" name="md[]" value="{{$md}}" placeholder="MD"></td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4"><button type="submit" class="btn btn-success">Simpan</button></td>
                                    </tr>
                                </tfoot>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection