@extends('layouts.user_layout')
@section('content')
<h1>Website Settings</h1>
{!! Form::open(['method'=>'POST', 'action'=> 'Admin\AdminSettingsController@update'])!!}
@csrf
<div class="form-group">
    {!! Form::label('site_name', 'Site Name:') !!}
    {!! Form::text('site_name', $settings->site_name, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('contact_number', 'Contact Number:') !!}
    {!! Form::text('contact_number', $settings->contact_number, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('contact_email', 'Email:') !!}
    {!! Form::text('contact_email', $settings->contact_email, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', $settings->address, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}    
</div>
{!! Form::close() !!}
@include('includes.form_error')
@stop
@extends('layouts.user_footer')

