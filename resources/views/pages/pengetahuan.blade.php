@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
           <div class="col-md-12">
               <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                   <li class="breadcrumb-item active"><a href="{{url('blog')}}">Pengetahuan</a></li>
               </ol>
               @foreach($penyakits as $penyakit)
               <div class="card">
                   <div class="card-block">

                           <div class="panel panel-default">
                               <div class="panel-body">
                                   <div class="media">
                                       <div class="media-body">
                                           <h4 class="media-heading">{{$penyakit->nama_penyakit}}</h4>
                                           <p>{!!$penyakit->desc!!}</p>
                                           <div class="clearfix"></div>
                                           <p><strong>Solusi:</strong><br/>{!!$penyakit->solusi!!}</p>
                                           <div class="clearfix"></div>
                                           <strong>Gejala :</strong><br/>
                                           <ul>
                                           @foreach($penyakit->pengetahuan as $pengetahuan)
                                               <li>
                                                   <p>
                                                       {{$pengetahuan->gejala->nama_gejala}}
                                                       <br/>
                                                        {!!$pengetahuan->gejala->desc!!}
                                                   </p>
                                                </li>
                                           @endforeach
                                           </ul>
                                       </div>
                                       <div class="media-right" style="padding-right: 10px">
                                           <a href="#">
                                               <?php $image = $penyakit->image ?'storage/'.$penyakit->image: 'img/default-placeholder.png' ?>
                                               <img width="300px" class="media-object" src="{{asset($image)}}">
                                           </a>
                                       </div>
                                   </div>
                               </div>
                           </div>
                   </div>
               </div>
               @endforeach
           </div>
        </div>
        <!--/.row-->
    </div>
</div>
@endsection
