@extends('layouts.app')

@section('content')
    @if(count($cabang) > 0)
        <h1>{{$cabang->nama}}</h1>
        <small>Created at: {{$cabang->created_at}}</small>
        <div class='well'>
            <h3>Alamat  : {{$cabang->alamat}}</h3>
            <h3>Telepon : {{$cabang->telp}}</h3>
        </div>
        
    @else
        <p> Cabang tidak ditemukan</p>
    @endif
@endsection