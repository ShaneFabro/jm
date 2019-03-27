@extends('layouts.user_layout')
@section('content')
<h1>Create Course</h1>
{!! Form::open(['method'=>'POST', 'action'=> 'Admin\AdminCoursesController@store'])!!}
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
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    
</div>
{!! Form::close() !!}
@include('includes.form_error')
@stop
@extends('layouts.user_footer')