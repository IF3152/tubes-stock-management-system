@extends('layouts.app')

@section('content')
    @if(count($cabang) > 0)
        <h1>{{$cabang->nama}}</h1>
        <!-- Go to Edit Page -->
        <a href="/cabang/{{$cabang->id}}/edit" class="btn btn-success">Edit</a>
        <!-- Delete -->
        {!! Form::open(['action'=> ['CabangsController@destroy', $cabang->id], 'method' => 'POST']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::button('Delete', ['type' => 'submit', 'class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
        <br>
        <small>Id : {{$cabang->id}}</small>
        <small>Created at: {{$cabang->created_at}}</small>
        <div class='well'>
            <h3>Alamat  : {{$cabang->alamat}}</h3>
            <h3>Telepon : {{$cabang->telp}}</h3>
        </div>
        
    @else
        <p> Cabang tidak ditemukan</p>
    @endif
@endsection