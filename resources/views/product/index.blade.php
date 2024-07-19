@extends('base')
@section('title','Products')

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
    <h1>Product List</h1>
<a class="btn btn-primary" href={{route('product.create')}}>Create</a>
</div>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>category</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $index => $product)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{$product->name}}</td>
                <td>{{Str::limit($product->description,40)}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->category->name}}</td>
                <td><img src="{{asset("storage/".$product->image)}}" alt=""></td>


                <td >
                    <div class="d-flex justify-content-center align-items-center gap-2">
                        <form>
                            <a href={{ route('product.edit', $product->id) }}  class="btn btn-primary">Update</a>

                        </form>

                        <form action={{route('product.destroy',$product->id)}} method='post'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </div>


                </td>
            </tr>
            @empty
            <td class="text-center" colspan="12">No Products</td>



            @endforelse

        </tbody>
    </table>
{{$products->links()}}

@endsection

