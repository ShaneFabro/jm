@extends('layouts.user_layout')
@section('content')
<h1>Edit Course</h1>
{!! Form::model($course, ['method'=>'PATCH', 'action'=> ['Admin\AdminCoursesController@update' , $course->id]])!!}
@csrf
<div class="form-group">
    {!! Form::label('course_name', 'Course:') !!}
    {!! Form::text('course_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('id', 'College:') !!}
    {!! Form::select('college_id', [''=> 'Choose College'] + $colleges, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
{!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminCoursesController@destroy', $course->id]])!!}
<div class="form-group">
    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}   
</div>
{!! Form::close() !!}
@include('includes.form_error')
@stop
@extends('layouts.user_footer')