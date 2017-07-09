@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
           <div class="col-md-12">
               <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                   <li class="breadcrumb-item"><a href="{{url('blog')}}">Pengetahuan</a></li>
               </ol>
               <div class="card">
                   <div class="card-block">
                       <h4>Konsultasi Penyakit Mata</h4>
                       <a href="{{url('konsultasi')}}" class="btn btn-success">Mulai</a>
                   </div>
               </div>
           </div>
        </div>
        <!--/.row-->
    </div>
</div>
@endsection
