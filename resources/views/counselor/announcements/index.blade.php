@extends('layouts.user_layout')

@section('content')
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Create Announcements</h1>
        {!! Form::open(['method'=>'POST', 'action'=>
        'Counselor\CounselorAnnouncementsController@store','files'=>true])!!}
        @csrf
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', $categories , null, ['class'=>'form-control'])
            !!}
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
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

        </div>
        {!! Form::close() !!}
        @include('includes.form_error')
    </div>

</div>
<div class="container">

    <h2>Announcements</h2>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <button id="myBtn" type="button" class="btn btn-round btn-success"
            style="margin-left: 170%; margin-bottom: 5%;">Create Announcement</button>
    </div>
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
            </tr>
        </thead>
        <tbody>
            @if($announcements)

            @foreach($announcements as $announcement)
            <tr>
                <td>{{$announcement->id}}</td>
                <td><img height="50"
                        src="{{$announcement->photo ? $announcement->photo->file : 'http://placehold.it/400x400'}}">
                </td>
                <td>{{$announcement->user->first_name}} {{$announcement->user->last_name}}</td>
                <td>{{$announcement->category ? $announcement->category->category_name : 'Uncategorized'}}</td>
                <td><a href="{{route('announcements.edit', $announcement->id)}}">{{$announcement->title}}</a></td>
                <td>{{$announcement->body}}</td>
                <td>{{$announcement->created_at->diffForHumans()}}</td>
                <td>{{$announcement->updated_at->diffForHumans()}}</td>
            </tr>

            @endforeach
            @endif

        </tbody>
    </table>
    {{ $announcements->links() }}
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