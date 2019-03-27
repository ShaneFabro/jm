@extends('layouts.user_layout')

@section('content')

<div class="container">

<h2>Trashed Announcements</h2>
        
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>User</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Restore</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
    @if($announcements)

        @foreach($announcements as $announcement)
        <tr>
        <td>{{$announcement->id}}</td>
        <td><img height ="50" src="{{$announcement->photo ? $announcement->photo->file : 'http://placehold.it/400x400'}}"></td>
        <td>{{$announcement->user->first_name}} {{$announcement->user->last_name}}</td>
        <td>{{$announcement->category ? $announcement->category->category_name : 'Uncategorized'}}</td>
        <td>{{$announcement->title}}td>
        <td>{{$announcement->body}}</td>
        <td>{{$announcement->created_at->diffForHumans()}}</td>
        <td>{{$announcement->updated_at->diffForHumans()}}</td>
        <td><a href="{{route('announcements.restore',[ 'id' => $announcement->id])}}">Restore</a></td>
        <td><a href="{{route('announcements.kill',[ 'id' => $announcement->id])}}">Delete</a></td>
        </tr>

        @endforeach
        @endif
    
    </tbody>
  </table>
</div>

@stop

@extends('layouts.user_footer')
