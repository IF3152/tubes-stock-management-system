@extends('layouts.app')

@section('content')
    <h1>List User (non-admin)</h1>
    <!--<a href="/admin/user/create" class="btn btn-default">Create</a>-->
    @if(count($users) > 0)
        @foreach($users as $user)
            <div class="well">
                <h3><a href="/admin/user/{{$user->id}}">{{$user->name}}</a></h3>
                <!-- Go to Edit Page -->
                <a href="/admin/user/{{$user->id}}/edit" class="btn btn-success">Edit</a>
                <!-- Delete -->
                {!! Form::open(['action'=> ['AdminUserController@destroy', $user->id], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::button('Delete', ['type' => 'submit', 'class'=>'btn btn-danger'])}}
                {!! Form::close() !!}
                <br>
                <small>Cabang : 
                    @if (!empty($userrole))
                        {{$userrole->cabang($user)->nama}}
                    @else
                        Belum ada
                    @endif
                </small>
                <small>Id     : {{$user->id}}</small>
            </div>
        @endforeach
    @else
        <p> Belum ada user yang dimasukkan </p>
    @endif
@endsection