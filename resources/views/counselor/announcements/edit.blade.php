@extends('layouts.user_layout')

@section('content')
<h1>Edit Announcements</h1>
<div class="col-sm-3">
    <img height="50" src = "{{$announcement->photo ? $announcement->photo->file :'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
</div>
{!! Form::model($announcement, ['method'=>'PATCH', 'action'=> ['Counselor\CounselorAnnouncementsController@update', $announcement->id],'files'=>true])!!}
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
    {!! Form::submit('Update Announcement', ['class'=>'btn btn-primary']) !!}
    
</div>
{!! Form::close() !!}

{!! Form::open(['method'=>'DELETE', 'action'=> ['Counselor\CounselorAnnouncementsController@destroy', $announcement->id]])!!}
<div class="form-group">
    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}   
</div>
{!! Form::close() !!}
@include('includes.form_error')
@stop

@extends('layouts.user_footer')
