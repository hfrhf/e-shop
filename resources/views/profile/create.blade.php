@extends('base')
@section('title','profile')



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
    <form  action={{route('profile.store')}} method='post' >
        @csrf




        <div class="form-group">
        <label class="form-label" for="name">Name:</label>
        <input class="form-control" type="text" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" type="text" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label class="form-label" for="password">password:</label>
            <input class="form-control" type="password" name="password" value="{{old('password')}}">
        </div>
        <div class="form-group">
            <label class="form-label" for="role">Role:</label>
            <select class="form-control" type="text" name="role" value="{{old('role')}}">
                <option value="user">user</option>
                <option value="admin">admin</option>
                <option value="editor">editor</option>

            </select>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
</div>



@endsection


