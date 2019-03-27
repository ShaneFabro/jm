@extends('layouts.user_layout')
@section('content')
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Create Categories</h1>
        {!! Form::open(['method'=>'POST', 'action'=> 'Admin\AdminCategoriesController@store'])!!}
        @csrf
        <div class="form-group">
            {!! Form::label('category_name', 'Category:') !!}
            {!! Form::text('category_name', null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}

        </div>
        {!! Form::close() !!}
        @include('includes.form_error')
    </div>

</div>

<div class="container">

    <h2>Categories</h2>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <button id="myBtn" type="button" class="btn btn-round btn-success"
            style="margin-left: 170%; margin-bottom: 5%;">Create Category</button>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>

                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($categories)

            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('categories.edit', $category->id)}}">{{$category->category_name}}</a></td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=> ['Admin\AdminCategoriesController@destroy',
                    $category->id]])!!}
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