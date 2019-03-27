@extends('layouts.user_layout')
@section('content')
<div class="container">
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Create College</h1>
            {!! Form::open(['method'=>'POST', 'action'=> 'Admin\AdminCollegesController@store'])!!}
            @csrf
            <div class="form-group">
                {!! Form::label('college_name', 'College:') !!}
                {!! Form::text('college_name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

            </div>
            {!! Form::close() !!}
            @include('includes.form_error')
        </div>

    </div>
    <h2>Colleges</h2>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <button id="myBtn" type="button" class="btn btn-round btn-success"
            style="margin-left: 170%; margin-bottom: 5%;">Create User</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>College</th>
            </tr>
        </thead>
        <tbody>
            @if($colleges)

            @foreach($colleges as $college)
            <tr>
                <td>{{$college->id}}</td>
                <td><a href="{{route('colleges.edit', $college->id)}}">{{$college->college_name}}</a></td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminCollegesController@destroy',
                    $college->id]])!!}
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