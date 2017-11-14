@extends('layouts.app')

@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Admin</a></li>
    <li><a href="/admin/barang">Barang</a> </li>
    <li>{{$data->nama}} </li>
    <li class="active">Tambah Stok Barang </li>
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
              <form class="form-horizontal" role="form" method="POST" action="{{ route('stok-barang-store', $data->id) }}">
                {{ csrf_field() }}
                        <div class="form-group">
                            <label for="stok_masuk" class="col-md-4 control-label">Stok Masuk *</label>
                            <div class="col-md-6">
                                <input id="stok_masuk" type="text" class="form-control" name="stok_masuk" value="{{ old('stok_masuk') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stok_keluar" class="col-md-4 control-label">Stok Keluar *</label>
                            <div class="col-md-6">
                                <input id="stok_keluar" type="text" class="form-control" name="stok_keluar" value="{{ old('stok_keluar') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi *</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>  
        </div>
    </div>
</div>
@endsection