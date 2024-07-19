@extends('base')
@section('title','categorys')

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
    <h1>category List</h1>
<a class="btn btn-primary" href={{route('category.create')}}>Create</a>
</div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>




                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td >
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <form>
                            <a href={{ route('category.edit', $category->id) }}  class="btn btn-primary">Update</a>

                        </form>
                         <form>
                            <a href={{ route('category.show', $category->id) }}  class="btn btn-dark">Show</a>

                        </form>

                        <form action={{route('category.destroy',$category->id)}} method='post'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </div>


                </td>
            </tr>
            @empty
            <td class="text-center" colspan="12">No Categories</td>



            @endforelse

        </tbody>
    </table>
{{$categories->links()}}

@endsection

