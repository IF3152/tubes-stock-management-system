@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <h1>List User (non-admin)</h1>
    <!--<a href="/admin/user/create" class="btn btn-default">Create</a>-->
    @if(count($users) > 0)
        @foreach($users as $user)
            <div class="well">
                <h3><a href="/admin/user/{{$user->id}}">{{$user->name}}</a></h3>
                <small>Cabang : 
                    @if (($userrole->cabang($user))!=null)
                        {{$userrole->cabang($user)->nama}}
                    @else
                        Belum ada
                    @endif
                </small>
                <small>Id     : {{$user->id}}</small>
                <!-- Go to Edit Page -->
                <div>
                <a href="/admin/user/{{$user->id}}/edit" class="btn btn-success">Edit</a>
                <!-- Delete -->
                {!! Form::open(['style'=>'display:inline-block'],['action'=> ['AdminUserController@destroy', $user->id], 'method' => 'POST']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::button('Delete', ['type' => 'submit', 'class'=>'btn btn-danger'])}}
                {!! Form::close() !!}
                
            </div>
                
            </div>
        @endforeach
    @else
        <p> Belum ada user yang dimasukkan </p>
    @endif
</div>
@endsection