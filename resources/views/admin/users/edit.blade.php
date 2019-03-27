@extends('layouts.user_layout')

@section('content')
<h1>EDIT USER</h1>
{!! Form::model($user, ['method'=>'PATCH', 'action'=> ['Admin\AdminUsersController@update', $user->id],'files'=>true])!!}
@csrf
@include('includes.form_error')
<p>
<div class="form-group">
    <img height="10" src = "{{$user->photo_id ? $user->photo->file :'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
</div>
<div class="form-group">
    {!! Form::label('first_name', 'Name:') !!}
    {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Name:') !!}
    {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('role_id', 'Role:') !!}
    {!! Form::select('role_id', [''=>'Choose Options'] + $roles , null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('is_active', 'Status:') !!}
    {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('photo_id', 'Photo:') !!}
    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Change Password:') !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'New Password:') !!}
    {!! Form::password('password',  ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Confirm New Password:') !!}
    {!! Form::password('password_confirmation',  ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
    
</div>
{!! Form::close() !!}

{!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminUsersController@destroy', $user->id]])!!}
<div class="form-group">
    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}   
</div>
{!! Form::close() !!}

@stop

@extends('layouts.user_footer')