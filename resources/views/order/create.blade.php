@extends('layouts.app')

@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Pemesanan</a></li>
    <li><a href="/admin/barang">Baru</a> </li>
    <li class="active">{{auth()->user()->id}} </li>
</ol>

    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
              <form class="form-horizontal" role="form" method="POST" action="{{ route('pemesanan.store') }}">
                {{ csrf_field() }}
                        <div class="form-group">
                            <label for="cabang" class="col-md-4 control-label">Cabang *</label>
                            <div class="col-md-6">
                                <input type="hidden" id="cabang_id" name="cabang_id" value="{{$data->cabang_id}}">
                                <input id="cabang" type="text" class=" form-control" name="cabang" value="{{$data->cabangnya->nama }}" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kode_pemesanan" class="col-md-4 control-label">kode_pemesanan *</label>
                            <div class="col-md-6">
                                <input id="kode_pemesanan" type="text" class=" form-control" name="kode_pemesanan" value="{{substr(sha1(time()),1,5) }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">Lanjut ke Daftar Barang</button>
                            </div>
                        </div>                        
                    </form>  
        </div>
    </div>
</div>
@endsection