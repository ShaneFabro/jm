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
            <th>summary</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td>{{$submission->studnum}}</td>
            <td>{{$submission->fname}} {{$submission->lname}}</td>
            <td>{{$submission->course}}</td>
            <td>{{$submission->contnum}}</td>
            <td>{{$submission->emailadd}}</td>
            <td>{{$submission->created_at->diffForHumans()}}</td>
            <td><a href="{{route('assessed.summary',[ 'id' => $submission->summary_id])}}">Summary</a></td>
            <td><a href="{{route('assessed.kill',[ 'id' => $submission->id])}}">Delete</a></td>
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