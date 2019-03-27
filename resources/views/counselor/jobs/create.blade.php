@extends('layouts.user_layout')

@section('content')
<h1>Create Job</h1>
{!! Form::open(['method'=>'POST', 'action'=> 'Counselor\CounselorJobsController@store', 'files' =>true])!!}
@csrf
<div class="form-group">
    {!! Form::label('company', 'Company:') !!}
    {!! Form::text('company', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('photo_id', 'Company Logo:') !!}
    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('is_open', 'Application status:') !!}
    {!! Form::select('is_open', array(1 => 'Application is open', 0 => 'Application is closed'), 1, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('job_title', 'Job:') !!}
    {!! Form::text('job_title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('job_description', 'Description:') !!}
    {!! Form::textarea('job_description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('job_qualification', 'Job Qualifications:') !!}
    {!! Form::textarea('job_qualification', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('job_requirement', 'Job Requirements:') !!}
    {!! Form::textarea('job_requirement', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('contact_person', 'Contact Person:') !!}
    {!! Form::textarea('contact_person', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    <select name="course_id" class="form-control">
        <option selected="selected">Choose Course</option>
        @foreach($colleges as $college)
        <optgroup label="{{$college->college_name}}">
            @foreach($courses as $course)
            @if($college->id == $course->college_id)
            <option name="course_id" value="{{$course->id}}">{{$course->course_name}}</option>
            @endif
            @endforeach
        </optgroup>
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

</div>
{!! Form::close() !!}
@include('includes.form_error')
@stop

@extends('layouts.user_footer')