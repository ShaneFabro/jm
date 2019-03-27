@extends('layouts.user_layout')

@section('content')
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
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
            {!! Form::label('job_title', 'Job:') !!}
            {!! Form::text('job_title', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('job_description', 'Job Description:') !!}
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
    </div>

</div>
<div class="container">

    <h2>Jobs</h2>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <button id="myBtn" type="button" class="btn btn-round btn-success"
            style="margin-left: 170%; margin-bottom: 5%;">Create Job</button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company Logo</th>
                <th>Company</th>
                <th>Job title</th>
                <th>Description</th>
                <th>Course</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if($jobs)

            @foreach($jobs as $job)
            <tr>
                <td>{{$job->id}}</td>
                <td><img height="50" src="{{$job->photo ? $job->photo->file : 'http://placehold.it/400x400'}}"></td>
                <td><a href="{{route('jobs.edit', $job->id)}}">{{$job->company}}</a></td>
                <td>{{$job->job_title}}</td>
                <td>{{$job->job_description}}</td>
                <td>{{$job->course ? $job->course->course_name : 'Uncategorized'}}</td>
                <td>{{$job->created_at->diffForHumans()}}</td>
                <td>{{$job->updated_at->diffForHumans()}}</td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
</div>
<script>
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

@stop

@extends('layouts.user_footer')