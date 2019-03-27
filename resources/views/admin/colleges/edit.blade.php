@extends('layouts.user_layout')
@section('content')
<h1>Edit Colleges</h1>
{!! Form::model($college, ['method'=>'PATCH', 'action'=> ['Admin\AdminCollegesController@update' , $college->id]])!!}
@csrf
<div class="form-group">
    {!! Form::label('college_name', 'Category:') !!}
    {!! Form::text('college_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update College', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}

{!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminCollegesController@destroy', $college->id]])!!}
<div class="form-group">
    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}   
</div>
{!! Form::close() !!}
@include('includes.form_error')
@stop
@extends('layouts.user_footer')