@extends('layouts.user_layout')

@section('content')
<div class="container">
    <h2>Users</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Restore</th>
        <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @if($userss)

            @foreach($userss as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}"></td>
                <td>{{$user->first_name}} {{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'no date'}}</td>
                <td>{{$user->updated_at ? $user->created_at->diffForHumans() : 'no date'}}</td>
                <td><a href="{{route('users.restore',[ 'id' => $user->id])}}">Restore</a></td>
                <td><a href="{{route('users.kill',[ 'id' => $user->id])}}">Delete</a></td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
</div>

@endsection

@extends('layouts.user_footer')