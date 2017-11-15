@extends('layouts.app')
@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/DataTables/datatables.min.css')}}"/>
<style type="text/css">
    .trunc {
        overflow:hidden;
        white-space:nowrap;
        text-overflow:ellipsis; 
    }
    td {
        max-width: 150px;
    }
</style>
@endsection
@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Admin</a></li>
    <li class="active">Barang </li>
</ol>

    <div class="row">
        <div class="col-md-12">
                <a href="{{route('pemesanan.create')}}" class="btn btn-success pull-right"> BUAT BARU</a>
                <div class="">
                    <div class="table">
                    <table class="table table-striped" id="contoh" data-form="deleteForm">
                    <thead>
                    <tr>
                        <td>Cabang ID</td>
                        <td>Kode Pemesanan</td>
                        <td>Total</td>
                        <td>Status</td>
                        <td width="20%">Edit</td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->cabangnya->nama}} </td>
                        <td>{{$data->kode_pemesanan}} </td>
                        <td>{{$data->harga}} </td>
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
                </div>
        </div>
    </div>
</div>
<div class="modal" id="confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you, want to delete?</p>
                <p></p>
                <ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" id="delete-btn">Delete</button>
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script type="text/javascript" src="{{ asset('vendor/DataTables/datatables.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#contoh').DataTable( {
        dom : 'Bftlip',
        buttons: [
            {
                extend: 'print',
                text: '<em>P</em>rint',
                key: {
                    key: 'p',
                    altkey: true
                }
            },
            'pdf',
            {
                extend: 'excel',
                text: 'Excel',
                filename : 'Data Barang',
            },
        ],
        ordering : true,
    } );
} );

</script>
<script type="text/javascript">
    //MENAMPILKAN PESAN
    @if (session()->has('pesan'))
    alertify.success("{{ (string)Session::get('pesan') }}");
    @endif
</script>

<script type="text/javascript">
$('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
    e.preventDefault();
    var $form=$(this);
    $('#confirm').modal({ backdrop: 'static', keyboard: false })
        .on('click', '#delete-btn', function(){
            $form.submit();
        });
});
</script>
@endsection