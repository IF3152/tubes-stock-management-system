@extends('layouts.app')

@section('content')
    <!-- Laravel Collective -->
    {!! Form::open(['action' => 'AdminUserController@store', 'method' => 'POST']) !!}
        <div class='form-group'>
            {{Form::label('nama', 'Nama')}}
            {{Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'Nama'])}}
        </div>
        <div class='form-group'>
            {{Form::label('cabang', 'Cabang')}}
            <br>
            {{Form::select('cabang', $cabang_map, null, ['placeholder' => 'Pilih cabang'])}}
        </div>
        {{Form::button('Submit', ['type' => 'submit', 'class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection