@extends('layouts.user_layout')
@section('content')
<h1>Edit Categories</h1>
{!! Form::model($category, ['method'=>'PATCH', 'action'=> ['Admin\AdminCategoriesController@update' , $category->id]])!!}
@csrf
<div class="form-group">
    {!! Form::label('category_name', 'Category:') !!}
    {!! Form::text('category_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}

{!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminCategoriesController@destroy', $category->id]])!!}
<div class="form-group">
    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}   
</div>
{!! Form::close() !!}
@include('includes.form_error')
@stop
@extends('layouts.user_footer')
