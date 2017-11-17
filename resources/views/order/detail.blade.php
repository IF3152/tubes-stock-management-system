@extends('layouts.app')

@section('page-css')
<meta name="id-pemesanan" content="{{ $data->id }}">
@endsection
@section('content')


<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="#">Pemesanan</a></li>
    <li><a href="#">Baru</a> </li>
    <li><a href="#">Rincian</a> </li>
    <li class="active">{{$data->id}}</li>
</ol>

    <div class="row" >
        <div class="col-md-12">
            <rincian-pemesanan></rincian-pemesanan>
            <form class="form-horizontal" role="form" method="POST" action="{{ route('pemesanan-finish',$data->id) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-success">Selesai</button>
                    </div>
                </div>                        
           </form>  
        </div>
    </div>
</div>

@endsection