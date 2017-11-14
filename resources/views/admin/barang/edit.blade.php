@extends('layouts.app')

@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Admin</a></li>
    <li><a href="/admin/barang">Barang</a> </li>
    <li class="active">Edit </li>
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
              <form class="form-horizontal" role="form" method="POST" action="{{ route('barang.update', $data->id) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group">
                            <label for="sku" class="col-md-4 control-label">SKU *</label>
                            <div class="col-md-6">
                                <input id="sku" type="text" class="form-control" name="sku" value="{{ $data->sku }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-md-4 control-label">Nama *</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi *</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="deskripsi" id="deskripsi">{{ $data->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kategori" class="col-md-4 control-label">Kategori *</label>
                            <div class="col-md-6">
                            <select name="kategori" class="form-control">
                                @foreach ($kategori as $kategori)
                                    <option  value="{{ $kategori->id }}" {{ $kategori->id==$data->kategorinya->id ? 'selected' : ''}}>{{ $kategori->nama }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="merek" class="col-md-4 control-label">Merek *</label>
                            <div class="col-md-6">
                            <select name="merek" class="form-control">
                                @foreach ($merek as $merek)
                                    <option  value="{{ $merek->id }}" {{ $merek->id==$data->mereknya->id ? 'selected' : ''}}>{{ $merek->nama }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="supplier" class="col-md-4 control-label">Supplier *</label>
                            <div class="col-md-6">
                            <select name="supplier" class="form-control">
                                @foreach ($supplier as $supplier)
                                    <option  value="{{ $supplier->id }}" {{ $supplier->id==$data->suppliernya->id ? 'selected' : ''}}>{{ $supplier->nama }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="berat" class="col-md-4 control-label">Berat *</label>
                            <div class="col-md-6">
                                <input id="berat" type="text" class="form-control" name="berat" value="{{ $data->berat }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harga" class="col-md-4 control-label">Harga Satuan *</label>
                            <div class="col-md-6">
                                <input id="harga" type="text" class="form-control" name="harga" value="{{ $data->harga }}" required autofocus>
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