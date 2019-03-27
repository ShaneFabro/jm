@extends('layouts.user_layout')

@section('content')

<div class="container">

    <h2>Trashed Jobs</h2>
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
                <th>Restore</th>
                <th>Delete</th>
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
                <td><a href="{{route('jobs.restore',[ 'id' => $job->id])}}">Restore</a></td>
                <td><a href="{{route('jobs.kill',[ 'id' => $job->id])}}">Delete</a></td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
</div>

@stop

@extends('layouts.user_footer')