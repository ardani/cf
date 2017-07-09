@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
           <div class="col-md-12">
               <ol class="breadcrumb">
                   <li class="breadcrumb-item">Pertanyaan</li>
                   <li class="breadcrumb-item"><a href="#">Gejala {{$gejala->kode_gejala}}</a></li>
               </ol>
               <div class="card">
                   <div class="card-block">
                       <form action="{{url('konsultasi')}}" method="post">
                       <div class="row">
                           <div class="col-8">
                               <h5>{{$gejala->nama_gejala}}</h5>
                                <p>{{$gejala->dec}}</p>
                                <p>{{$gejala->pertanyaan}}</p>
                               <div class="form-group col-6">
                                   <label class="form-control-label" for="select">Jawaban</label>
                                   {{csrf_field()}}
                                   <input type="hidden" name="gejala" value="{{$gejala->kode_gejala}}"/>
                                   <select id="select" name="jawaban" class="form-control">
                                       @foreach($options as $option)
                                           <option value="{{$option->nilai}}">{{$option->nama}}</option>
                                       @endforeach
                                   </select>
                               </div>
                           </div>
                           <div class="col-4" style="min-height: 280px">
                               @if($gejala->image)
                               <div class="help-block">Gambar:</div>
                               <div class="img-responsive">
                                   <img width="100%" src="{{asset('storage/'.$gejala->image)}}" alt=""/>
                               </div>
                               @endif
                           </div>
                           <div class="col-12">
                               <button type="submit" class="btn btn-success">Selanjutnya</button>
                           </div>
                       </div>
                       </form>
                   </div>
               </div>
           </div>
        </div>
        <!--/.row-->
    </div>
</div>
@endsection
