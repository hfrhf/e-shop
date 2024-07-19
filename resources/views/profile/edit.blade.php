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
    <form  action={{route('profile.update',$profile->id)}} method='post' >
        @csrf
        @method('PUT')




        <div class="form-group">
        <label class="form-label" for="name">Name:</label>
        <input class="form-control" type="text" name="name" value="{{old('name',$profile->name)}}">
        </div>
        <div class="form-group">
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" type="text" name="email" value="{{old('email',$profile->email)}}">
        </div>
        <div class="form-group">
            <label class="form-label" for="password">password:</label>
            <input class="form-control" type="password" name="password" value="{{old('password')}}">
        </div>
        <div class="form-group">
            <label class="form-label" for="role">Role:</label>
            <select class="form-control" type="text" name="role"  >
                <option @selected(old('role',$profile->role)) value="user">user</option>
                <option @selected(old('role',$profile->role)) value="admin">admin</option>
                <option @selected(old('role',$profile->role)) value="editor">editor</option>

            </select>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
</div>



@endsection


