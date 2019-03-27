@extends('layouts.user_layout')
@section('content')
<h1>Create College</h1>
{!! Form::open(['method'=>'POST', 'action'=> 'Admin\AdminCollegesController@store'])!!}
@csrf
<div class="form-group">
    {!! Form::label('college_name', 'College:') !!}
    {!! Form::text('college_name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    
</div>
{!! Form::close() !!}
@include('includes.form_error')
@stop
@extends('layouts.user_footer')