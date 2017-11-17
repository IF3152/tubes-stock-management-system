@extends('layouts.app')

@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="#">Admin</a></li>
    <li><a href="#">Pemesanan</a> </li>
    <li class="active">{{$data->kode_pemesanan}} </li>
</ol>
<a title='Return'  href="{{route('pemesanan-admin')}}" ><i class='fa fa-chevron-circle-left '></i> &nbsp; Kembali ke Pemesanan</a>

    <div class="row">
    	        <div class="col-md-12">
            @foreach ($barang as $runout)
            @if ($runout->stok <= 10)
            <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              <b>{{$runout->nama}}</b>  akan segera habis. Silakan melakukan pengadaan baru <a href="{{url('/admin/stok-barang',$runout->id)}}">disini</a> 
            </div>
            @else
            @endif
            @endforeach
        </div>
        <div class="col-md-12">
             <div class="panel panel-default">
                <div class="panel-heading">Kode Pemesanan : {{$data->kode_pemesanan}}</div>

                <div class="panel-body">
                    <table width="100%" class="table">
                        <tr>
                            <td width="40%"><strong>Kode Pemesanan</strong></td>
                            <td>{{$data->kode_pemesanan}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Cabang</strong></td>
                            <td>{{$data->cabangnya->nama}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Total Harga</strong></td>
                            <td>{{$data->harga}}</td>
                        </tr>
                        <tr>
                            <td width="40%"><strong>Status</strong></td>
                            <td>
                                @if ($data->status==-1)
                                    <span class="label label-danger"> Di batalkan</span>
                                @elseif ($data->status==0)
                                    <span class="label label-primary"> Proses </span>
                                @elseif ($data->status==1)
                                    <span class="label label-success"> Selesai </span>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <h4>Daftar Barang</h4>
                    <table class="table">
                        <thead>
                            <tr>
                            <td>Barang</td>
                            <td>@</td>
                            <td>Qty</td>
                            <td style="text-align: right;">Total Harga</td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($rincian as $r)
                        <tr>
                            <td>{{$r->barangnya->nama}} </td>
                            <td>{{$r->harga_satuan}} </td>
                            <td>{{$r->qty}} </td>
                            <td style="text-align: right;"> Rp {{$r->harga_total}} </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">Total</td>
                                <td style="text-align: right;"> Rp {{$data->harga}}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div>
                    	@if ($data->status==0)
                    	<form style="display: inline-block;" class="form-horizontal" role="form" method="POST" action="{{ route('ganti-status-store', $data->id) }}">
		                {{ csrf_field() }}
		                <input name="_method" type="hidden" value="PATCH">
                            <button type="submit" class="btn btn-success">
                                Setuju
                            </button>
		                </form> 
		                <form style="display: inline-block;" class="form-horizontal" role="form" method="POST" action="{{ route('ganti-status-decline', $data->id) }}">
		                {{ csrf_field() }}
		                <input name="_method" type="hidden" value="PATCH" >
                            <button type="submit" class="btn btn-danger">
                                Batalkan
                            </button>
		                </form> 
		                @else
		                @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection