@extends('layouts.app')
@section('page-css')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/DataTables/datatables.min.css')}}"/>
@endsection
@section('content')

<div class="container-fluid">
<ol class="breadcrumb">
    <li><a href="/admin">Admin</a></li>
    <li class="active">Supplier </li>
</ol>

    <div class="row">
        <div class="col-md-12">
                <a href="{{route('supplier.create')}}" class="btn btn-success pull-right"> BUAT BARU</a>
                <div class="">
                    <div class="table ">
                    <table class="table table-striped" id="contoh" data-form="deleteForm">
                    <thead>
                    <tr>
                        <td style="max-width: 10px">ID</td>
                        <td>Nama</td>
                        <td>Alamat</td>
                        <td>Telp</td>
                        <td width="20%">Edit</td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->id}} </td>
                        <td>{{$data->nama}} </td>
                        <td>{{$data->alamat}} </td>
                        <td>{{$data->telp}} </td>
                        <td>
                            <a href="{{route('supplier.show', $data->id)}}" class="btn btn-xs btn-primary"><span class="fa fa-eye"></span></a>
                            <a href="{{route('supplier.edit', $data->id)}}" class="btn btn-xs btn-warning"><span class="fa fa-edit"></span></a>
                            <form id="destroy{{$data->id}}" method="POST" action="{{ route('supplier.destroy', $data->id) }}" accept-charset="UTF-8" class="form-delete" style="display: inline-block;">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                           
                            <button type="submit" class="btn btn-xs btn-danger" name="delete-modal" > <span class="fa fa-trash-o"> </button>
                            </form>
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
        dom : 'ftlip'
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