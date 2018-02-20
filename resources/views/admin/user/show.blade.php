@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    @if(count($user) > 0)
        <h1>{{$user->name}}</h1>
        <!-- Go to Edit Page -->
        <a href="/admin/user/{{$user->id}}/edit" class="btn btn-success">Edit</a>
        <!-- Delete -->
        {!! Form::open(['action'=> ['AdminUserController@destroy', $user->id], 'method' => 'POST']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::button('Delete', ['type' => 'submit', 'class'=>'btn btn-danger'])}}
        {!! Form::close() !!}
        <br>
        <small>Id : {{$user->id}}</small>
        <small>Created at: {{$user->created_at}}</small>
        <div class='well'>
            <h3>Cabang  : {{$cabang->nama}}</h3>
        </div>
        
    @else
        <p> Cabang tidak ditemukan</p>
    @endif
</div>
@endsection