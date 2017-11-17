@extends('layouts.notifiers')

@section('content')
<div class="container-fluid">
    <div class="row">
<div class="col-md-12">
            @foreach ($runoutbarang as $runout)
            @if ($runout->stok <= 10)
            <div class="alert alert-danger" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
              <span class="sr-only">Error:</span>
              <b>{{$runout->nama}}</b>  akan segera habis. Silakan melakukan pengadaan baru <a href="{{url('/admin/stok-barang',$runout->id)}}">disini</a> 
            </div>
            @else
            @endif
            @endforeach
        </div>
    </div>
    <!-- OVERVIEW -->
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">Dashboard</h3>
                            <p class="panel-subtitle">
                                Valid till {{date('l, d M Y')}}
                            </p>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-download"></i></span>
                                        <p>
                                            <span class="number">{{$data['totalbarang']}}</span>
                                            <span class="title">Total Barang</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-university"></i></span>
                                        <p>
                                            <span class="number">{{$data['totalcabang']}}</span>
                                            <span class="title">Total Cabang</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                                        <p>
                                            <span class="number">{{$data['totalpemesanan']}}</span>
                                            <span class="title">Total Order</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="metric">
                                        <span class="icon"><i class="fa fa-bar-chart"></i></span>
                                        <p>
                                            <span class="number">{{ substr($data['persen'],0,2)}} %</span>
                                            <span class="title">Order Sukses</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div id="headline-chart" class="ct-chart"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="weekly-summary text-right">
                                        <span class="number">{{$data['pesanbulan']}}</span> <span class="percentage">
                                        <span class="info-label">Order Bulan ini</span>
                                    </div>
                                    <div class="weekly-summary text-right">
                                        <span class="number">{{$data['pendapatanbulan']}}</span> <span class="percentage">
                                        <span class="info-label">Pendapatan Bulan ini</span>
                                    </div>
                                    <div class="weekly-summary text-right">
                                        <span class="number">{{$data['totalpendapatan']}}</span> <span class="percentage">
                                        <span class="info-label">Total Pendapatan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
<!-- RECENT PURCHASES -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Pemesanan Terkini</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body no-padding">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <td>Cabang ID</td>
                                            <td>Tanggal Order</td>
                                            <td>Kode Pemesanan</td>
                                            <td>Status</td>
                                            <td width="20%">Edit</td>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($recentpemesanan as $data)
                                        <tr>
                                            <td>{{$data->cabangnya->nama}} </td>
                                            <td>{{substr($data->created_at,0,10)}} </td>
                                            <td>{{$data->kode_pemesanan}} </td>
                                            <td>
                                                    @if ($data->status==-1)
                                                        <span class="label label-danger"> Di batalkan</span>
                                                    @elseif ($data->status==0)
                                                        <span class="label label-primary"> Proses </span>
                                                    @elseif ($data->status==1)
                                                        <span class="label label-success"> Selesai </span>
                                                    @endif
                                            </td>
                                            <td>
                                                <a href="{{route('ganti-status-view', $data->id)}}" class="btn btn-xs btn-primary">Ganti Status</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        </table>
                                                    </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
                                        <div class="col-md-6 text-right"><a href="{{route('pemesanan-admin')}}" class="btn btn-primary">View All Purchases</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END RECENT PURCHASES -->
                        </div>
                        <div class="col-md-6">
<!-- RECENT PURCHASES -->
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Kondisi Barang ( paling sedikit )</h3>
                                    <div class="right">
                                        <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                        <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
                                    </div>
                                </div>
                                <div class="panel-body no-padding">
                                    <table class="table table-striped" id="contoh" data-form="deleteForm">
                                        <thead>
                                        <tr>
                                            <td>Nama</td>
                                            <td>Stok</td>
                                            <td width="20%">Edit</td>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($runoutbarang as $data)
                                        <tr>
                                            <td>{{$data->nama}} </td>
                                            <td>{{$data->stok}} </td>
                                            <td>
                                                <a href="{{route('stok-barang', $data->id)}}" class="btn btn-xs btn-success"><span class="fa fa-plus"></span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                        </table>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-md-6"><span class="panel-note"><i class="fa fa-clock-o"></i> Last 24 hours</span></div>
                                        <div class="col-md-6 text-right"><a href="{{route('barang.index')}}" class="btn btn-primary">View All Purchases</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- END RECENT PURCHASES -->
                        </div>

                    </div>
</div>
@endsection
@section('page-script')
<script type="text/javascript">
        var data, options;

        // headline charts
        data = {
            labels: ['week ago', '5 days ago', '4 days ago', '3 days ago', '2 days ago', 'Yesterday', 'Today'],
            series: [
                [{{$trends['dayminus6']}}, {{$trends['dayminus5']}}, {{$trends['dayminus4']}}, 
                {{$trends['dayminus3']}}, {{$trends['dayminus2']}}, {{$trends['dayminus1']}}, {{$trends['day']}}],
            ]
        };

        options = {
            height: 300,
            showArea: false,
            showLine: true,
            showPoint: true,
            fullWidth: true,
            axisX: {
                showGrid: false
            },
            lineSmooth: true,
        };

        new Chartist.Line('#headline-chart', data, options);
</script>
@endsection