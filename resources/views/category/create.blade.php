@extends('base')
@section('title','category')



@include('admin.sidebar')
@section('content')

<div class="form">
    @if ($errors->any())

        <div class="alert alert-danger">
            <h2 class="">Errors:</h2>
           @foreach ($errors->all() as $error)
            <ul class="list-group">
             <li class="">{{$error}}</li>
            </ul>
           @endforeach

        </div>



    @endif
    <form  action={{route('category.store')}} method='post' >
        @csrf




        <div class="form-group">
        <label class="form-label" for="name">Name:</label>
        <input class="form-control" type="text" name="name" value="{{old('name')}}">
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
</div>



@endsection
