@extends('layouts.app')

@section('content')
    <!-- Laravel Collective -->
    {!! Form::open(['action' => 'CabangsController@store', 'method' => 'POST']) !!}
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
        {{Form::button('Submit', ['type' => 'submit', 'class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection