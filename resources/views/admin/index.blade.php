
@extends('layouts.app')

@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Admin</a></li>
</ol>

    <div class="row">
        <div class="col-md-12">
           Halaman Admin
			<ul>
			<li><a href="{{route('kategori.index')}}">Kategori</a></li>
			<li><a href="{{route('merek.index')}}">Merek</a></li>
			<li><a href="{{route('supplier.index')}}">Supplier</a></li>
			<li><a href="{{route('barang.index')}}">Barang</a></li>
			</ul>
        </div>
    </div>
</div>
@endsection