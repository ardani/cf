@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
           <div class="col-md-12">
               <ol class="breadcrumb">
                   <li class="breadcrumb-item">Hasil</li>
               </ol>
               <div class="card">
                   <div class="card-block">
                       <div class="row">
                           <div class="col-12">
                               <h3>Rekap Jawaban</h3>
                               <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Jawaban</th>
                                    </tr>
                                </thead>
                                   <tbody>
                                   <?php $no = 1; ?>
                                   @foreach($gejala_yes as $gejala)
                                       <tr>
                                           <td>{{$no}}</td>
                                           <td>({{$gejala->kode_gejala}}) {{$gejala->nama_gejala}}</td>
                                           <td>{{$options['nilai-'.$answers[$gejala->kode_gejala]]->nama}}</td>
                                       </tr>
                                       <?php $no++?>
                                   @endforeach
                                   @foreach($gejala_no as $gejala)
                                       <tr>
                                           <td>{{$no}}</td>
                                           <td>({{$gejala->kode_gejala}}) {{$gejala->nama_gejala}}</td>
                                           <td>{{$options['nilai-'.$answers[$gejala->kode_gejala]]->nama}}</td>
                                       </tr>
                                       <?php $no++?>
                                   @endforeach
                                   </tbody>
                               </table>
                           </div>
                           <div class="col-12">
                               <h3>Hasil Konsultasi</h3>
                               <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Penyakit</th>
                                            <th>Nilai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                   @if(!$results)
                                       <tr>
                                           <td colspan="2">Tidak ada indikasi penyakit mata</td>
                                       </tr>
                                   @endif
                                    @foreach($results as $key => $result)
                                        <tr>
                                            <td><a target="_blank" href="{{url('blog?kode_penyakit='.$key)}}">{{$result['data']->nama_penyakit}}</a></td>
                                            <td>{{$result['nilai']}} -> {{$result['nilai']*100}}%</td>
                                            <td><a data-toggle="collapse" href="#rumus-{{$key}}">Rumus</a></td>
                                        </tr>
                                        <tr id="rumus-{{$key}}" class="collapse collapsing">
                                            <td colspan="3">
                                                <p>Nilai CF Pakar * CF User</p>
                                                <ul>
                                                    <?php $no = 1 ?>
                                                    @foreach($rumus[$key]['cf_pakar_user'] as $gejala => $row)
                                                        <li>CF {{$no}} ({{$gejala}}) : {{number_format($row,2)}}</li>
                                                        <?php $no++ ?>
                                                    @endforeach
                                                </ul>
                                                <p>Nilai CF Combine</p>
                                                <ul>
                                                    <li>CF old (CF 1 dan CF 2) = {{number_format($row,2)}}</li>
                                                    @foreach($rumus[$key]['cf_combine'] as $no => $row)
                                                        @if($no > 0)
                                                            <li>(CF {{$no+2}} dan CF old) = {{number_format($row,5)}}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                   </tbody>
                               </table>
                               <a href="{{url('/')}}" class="btn btn-success">Konsultasi Kembali</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
        </div>
        <!--/.row-->
    </div>
</div>
@endsection
