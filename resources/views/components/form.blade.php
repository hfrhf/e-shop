@props(['method','METHOD','product'=>null,'update','categories'])

@php

if ($update) {
   $route= route('product.update',$product->id);

} else {
    $route= route('product.store');
}

@endphp

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

    <form  action={{$route}} method={{$method}} enctype="multipart/form-data">
        @csrf
        @method($METHOD)



        <div class="form-group">

        <label class="form-label" for="name">Name:</label>
        <input class="form-control" type="text" name="name" value="{{old('name',$product->name ?? '')}}">
        </div>
        <div class="form-group">
        <label class="form-label" >Description:</label>
        <textarea class="form-control" type="text" name="description" >{{old('description',$product->description?? '')}}</textarea>
        </div>
        <div class="form-group">
        <label class="form-label" >Price:</label>
        <input class="form-control" type="number" value="{{old('price',$product->price?? '')}}" name="price">
    </div>
    <div class="form-group">
        <label class="form-label" >Quantity:</label>
        <input class="form-control" type="number" value="{{old('quantity',$product->quantity?? '')}}" name="quantity">
    </div>
    <select name="category_id" id="">
        <option value='' disabled>choose category</option>
        @foreach ($categories as $category)
        @php

if ($update) {

   $selected=old('category_id',$product->category_id)===$category->id;
} else {

    $selected=old('category_id')===$category->id ;
}

@endphp
        <option @selected($selected)  value='{{$category->id}}'>{{$category->name}}</option>

        @endforeach
    </select>
        <input class="form-control" type="file" name="image">
        <div>
            @isset($product)
            <div>
                <img width="70px" src={{ asset('storage/'.$product->image) }} alt="">
            </div>

        @endisset

        </div>


        <button class="btn btn-success">Submit</button>
    </form>
</div>

