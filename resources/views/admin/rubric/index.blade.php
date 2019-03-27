@extends('layouts.user_layout')
@section('content')
<div class="container">
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Create Rubric Category</h1>
            {!! Form::open(['method'=>'POST', 'action'=> 'Admin\AdminRubricsController@storecategory'])!!}
            @csrf
            <div class="form-group">
                {!! Form::label('name', 'Rubric Category:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('title_id', 'Title:') !!}
                {!! Form::select('title_id', [''=> 'Choose Categories'] + $titles , null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('rating_id', 'Rating:') !!}
                {!! Form::select('rating_id', [''=> 'Choose Categories'] + $ratings , null, ['class'=>'form-control'])
                !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

            </div>
            {!! Form::close() !!}
            @include('includes.form_error')
        </div>

    </div>

    <h2>Rubric</h2>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <button id="myBtn" type="button" class="btn btn-round btn-success"
            style="margin-left: 170%; margin-bottom: 5%;">Create Rubric</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Rating</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($rubrics)

            @foreach($rubrics as $rubric)
            <tr>
                <td><a href="{{route('rubric.edit', $rubric->id)}}">{{$rubric->title->name}}</a></td>
                <td>{{$rubric->name}}</td>
                <td>{{$rubric->rating->name}}</td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminRubricsController@destroy',
                    $rubric->id]])!!}
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