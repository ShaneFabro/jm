@extends('layouts.user_layout')
@section('content')
<h1>Create Categories</h1>
{!! Form::open(['method'=>'POST', 'action'=> 'Admin\AdminCategoriesController@store'])!!}
@csrf
<div class="form-group">
    {!! Form::label('category_name', 'Category:') !!}
    {!! Form::text('category_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    
</div>
{!! Form::close() !!}
@include('includes.form_error')
@stop
@extends('layouts.user_footer')