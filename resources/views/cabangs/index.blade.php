@extends('layouts.app')

@section('content')
<ol class="breadcrumb">
    <li><a href="{{route('cabang.index')}}">Cabang</a></li>
</ol>

    <h1>Daftar Cabang</h1>
    <a href="/cabang/create" class="btn btn-default">Create</a>
    @if(count($cabangs) > 0)
        @foreach($cabangs as $cabang)
            <div class="well">
                <h3><a href="cabang/{{$cabang->id}}">{{$cabang->nama}}</a></h3>
                <small>Id : {{$cabang->id}}</small>
                <small>Created at: {{$cabang->created_at}}</small>
            </div>
        @endforeach
    @else
        <p> Belum ada cabang yang dimasukkan </p>
    @endif
@endsection