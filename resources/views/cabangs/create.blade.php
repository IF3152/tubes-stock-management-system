@extends('layouts.app')

@section('content')
    <h1>Pendaftaran Cabang Baru</h1>
    @if(count($cabangs) > 0)
        @foreach($cabangs as $cabang)
            <!-- Belum ada Form -->
            <div class="well">
                <h3><a href="cabang/{{$cabang->id}}">{{$cabang->nama}}</a></h3>
                <small>Created at: {{$cabang->created_at}}</small>
            </div>
        @endforeach
    @else
        <p> Belum ada cabang yang dimasukkan </p>
    @endif
@endsection