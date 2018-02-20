@extends('layouts.app')

@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Manajemen</a></li>
    <li><a href="/admin/supplier">Supplier</a> </li>
    <li class="active">Edit</li>
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
              <form class="form-horizontal" role="form" method="POST" action="{{ route('supplier.update', $data->id) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                        <div class="form-group">
                            <label for="nama" class="col-md-4 control-label">Nama *</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $data->nama }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-md-4 control-label">Alamat *</label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ $data->alamat }}" required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telp" class="col-md-4 control-label">Telp *</label>
                            <div class="col-md-6">
                                <input id="telp" type="text" class="form-control" name="telp" value="{{ $data->telp }}" required >
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