@extends('base')
@section('title','profiles')

<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .table img {
        display: block;
        margin: auto;
        max-width: 100px;
        max-height: 100px;
    }
    .table-container {
        margin-top: 50px;
    }
    .table-description {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

@include('admin.sidebar')
@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1>profile List</h1>
<a class="btn btn-primary" href={{route('profile.create')}}>Create</a>
</div>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($profiles as $index => $profile)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$profile->name}}</td>
                <td>{{$profile->email}}</td>
                <td>{{$profile->role}}</td>


                <td >
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <form>
                            <a href={{ route('profile.edit', $profile->id) }}  class="btn btn-primary">Update</a>

                        </form>

                        <form action={{route('profile.destroy',$profile->id)}} method='post'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </div>


                </td>
            </tr>
            @empty
            <td class="text-center" colspan="12">No profiles</td>



            @endforelse

        </tbody>
    </table>
{{$profiles->links()}}

@endsection

