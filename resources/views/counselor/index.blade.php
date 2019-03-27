@extends('layouts.user_layout')

@section('content')
    <h1 class="page-header">
        Welcome
        @if($users)
        @foreach($users as $user)
        {{$user->first_name}}   
        @endforeach
        @endif
    </h1>
@endsection

@extends('layouts.user_footer')

