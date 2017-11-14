@extends('layouts.app')

@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Admin</a></li>
    <li><a href="/admin/kategori">Barang</a> </li>
    <li class="active">{{$data->nama}} </li>
</ol>
<a title='Return'  href="{{route('barang.index')}}" ><i class='fa fa-chevron-circle-left '></i> &nbsp; Kembali ke Barang</a>

    <div class="row">
        <div class="col-md-12">
             <div class="panel panel-default">
                <div class="panel-heading">Barang : {{$data->nama}}</div>

                <div class="panel-body">
                    <table width="100%" class="table">
                        <tr>
                            <td width="40%"><strong>sku</strong></td>
                            <td>{{$data->sku}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>nama</strong></td>
                            <td>{{$data->nama}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Deskripsi</strong></td>
                            <td>{{$data->deskripsi}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Kategori</strong></td>
                            <td>{{$data->kategorinya->nama}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Merek</strong></td>
                            <td>{{$data->mereknya->nama}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Supplier</strong></td>
                            <td>{{$data->suppliernya->nama}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Berat</strong></td>
                            <td>{{$data->berat}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Harga</strong></td>
                            <td>{{$data->harga}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Stok</strong></td>
                            <td>{{$data->stok}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection