@extends('layouts.user_layout')
@section('content')
<h1>Create Rubric Category</h1>
{!! Form::open(['method'=>'POST', 'action'=> 'Admin\AdminRubricsController@storecategory'])!!}
@csrf
<div class="form-group">
    {!! Form::label('name', 'Rubric Category:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('title_id', 'Title:') !!}
    {!! Form::select('title_id', [''=> 'Choose Categories'] + $titles , null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('rating_id', 'Category:') !!}
    {!! Form::select('rating_id', [''=> 'Choose Categories'] + $ratings , null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    
</div>
{!! Form::close() !!}
@include('includes.form_error')
@stop

@extends('layouts.user_footer')