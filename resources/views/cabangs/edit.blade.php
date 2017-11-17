@extends('layouts.app')

@section('content')
    <h1>Edit Cabang</h1>
    @if(count($cabang) > 0)
            {!! Form::open(['action' => ['CabangsController@update', $cabang->id], 'method' => 'POST']) !!}    
                <div class='form-group'>
                    {{Form::label('nama', 'Nama')}}
                    {{Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'Nama'])}}
                </div>
                <div class='form-group'>
                    {{Form::label('alamat', 'Alamat')}}
                    {{Form::text('alamat', '', ['class' => 'form-control', 'placeholder' => 'Alamat'])}}
                </div>
                <div class='form-group'>
                    {{Form::label('telp', 'Telp')}}
                    {{Form::text('telp', '', ['class' => 'form-control', 'placeholder' => 'Telp'])}}
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::button('Submit', ['type' => 'submit', 'class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
    @else
        <p> No posts found </p>
    @endif
@endsection