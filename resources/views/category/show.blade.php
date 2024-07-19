@extends('base')
@section('title','category')
    
<div class="row">
    <div class="col-2">
        @include('admin.sidebar')
    </div>
    <div class="col-10">
        @section('content')

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($category->product as $index => $product)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td><img width="80px" src="{{asset("storage/".$product->image)}}" alt=""></td>
        
        
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
        @endsection
    </div>
   

</div>


