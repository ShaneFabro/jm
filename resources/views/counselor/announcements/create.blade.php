@extends('layouts.user_layout')
@section('content')
<h1>Create Announcements</h1>
{!! Form::open(['method'=>'POST', 'action'=> 'Counselor\CounselorAnnouncementsController@store','files'=>true])!!}
@csrf
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Category:') !!}
    {!! Form::select('category_id', [''=> 'Choose Categories'] + $categories , null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('photo_id', 'Photo:') !!}
    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Description:') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    
</div>
{!! Form::close() !!}
@include('includes.form_error')
@stop

@extends('layouts.user_footer')