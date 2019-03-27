@extends('layouts.user_layout')

@section('content')

@if(count($submissions)>0)
@foreach($submissions as $submission)
<table class="table">
    <thead>
        <tr>
            <th>Student Number</th>
            <th>Full Name</th>
            <th>Course</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Submitted at</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{$submission->studnum}}</td>
            <td><a href="{{route('evaluation.evaluate', $submission->id)}}">{{$submission->fname}}
                    {{$submission->lname}}</a></td>
            <td>{{$submission->course}}</td>
            <td>{{$submission->contnum}}</td>
            <td>{{$submission->emailadd}}</td>
            <td>{{$submission->created_at->diffForHumans()}}</td>
        </tr>

        @endforeach
        @else
        <div class="offset-1" style="background-color: white;">
            <p>No posts found</p>
        </div>
        @endif

    </tbody>
</table>


@stop

@extends('layouts.user_footer')