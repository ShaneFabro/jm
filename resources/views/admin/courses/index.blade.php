@extends('layouts.user_layout')
@section('content')
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
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
    </div>

</div>
<div class="container">

    <h2>Courses</h2>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <button id="myBtn" type="button" class="btn btn-round btn-success"
            style="margin-left: 170%; margin-bottom: 5%;">Create Course</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course</th>
                <th>College</th>
            </tr>
        </thead>
        <tbody>
            @if($courses)

            @foreach($courses as $course)
            <tr>
                <td>{{$course->id}}</td>
                <td><a href="{{route('courses.edit', $course->id)}}">{{$course->course_name}}</a></td>
                <td>{{$course->college ? $course->college->college_name : 'Uncategorized'}}</a></td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminCoursesController@destroy',
                    $course->id]])!!}
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
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