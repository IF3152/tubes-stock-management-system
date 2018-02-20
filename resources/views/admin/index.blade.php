@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Menu Administrasi</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                        <li><a href="/admin/user/" >User List</a></li>
                        <li><a href="{{route('pemesanan-admin')}}" >Tampilkan Pemesanan</a></li>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
