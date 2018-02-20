@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
    <h1>Edit User </h1>
    @if(count($user) > 0)
            {!! Form::open(['action' => ['AdminUserController@update', $user->id], 'method' => 'POST']) !!}    <div class='form-group'>
                    {{Form::label('name', 'Nama')}}
                    {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nama'])}}
                </div>
                <div class='form-group'>
                    {{Form::label('cabang', 'Cabang')}}
                    <br>
                    {{Form::select('cabang', $cabang_map, null, ['class'=>'form-control','placeholder' => 'Pilih cabang'])}}
                </div>
                {{Form::hidden('_method', 'PUT')}}
                {{Form::button('Submit', ['type' => 'submit', 'class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
    @else

    @endif
    </div>
@endsection