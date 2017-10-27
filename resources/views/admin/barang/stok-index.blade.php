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
                            <td width="40%"><strong>Nama</strong></td>
                            <td>{{$data->nama}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Stok</strong></td>
                            <td>{{$data->stok}}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-md-12">
             <div class="panel panel-default">
                <div class="panel-heading">Keadaan Stok 
                <a href="{{route('stok-barang-create', $data->id) }}" class="btn btn-sm btn-success"> BUAT BARU</a>
                </div>
                    <table class="table table-striped" id="contoh">
                    <thead>
                    <tr>
                        <td>Tanggal</td>
                        <td>Stok Masuk</td>
                        <td>Stok Keluar</td>
                        <td>Keterangan</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($stokbarang as $stokbarang)
                    <tr>
                        <td>{{$stokbarang->created_at}} </td>
                        <td>{{$stokbarang->stok_masuk}} </td>
                        <td>{{$stokbarang->stok_keluar}} </td>
                        <td>{{$stokbarang->deskripsi}} </td>  
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
            </div>
            
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script type="text/javascript">
    //MENAMPILKAN PESAN
    @if (session()->has('pesan'))
    alertify.success("{{ (string)Session::get('pesan') }}");
    @endif
</script>
@endsection