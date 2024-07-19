@extends('base')
@section('title','Product')


@section('content')
<style>
    /* CSS Styles */
    body {

 
       
    }
    .product-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        
        margin: 20px;
        overflow: hidden;
    }
    .product-image img {
        width: 100%;
        height: auto;
    }
    .product-details {
        padding: 20px;
        text-align: center;
    }
    .product-details h4 {
        margin: 10px 0;
        font-size: 24px;
        color: #333;
    }
    .product-details p {
        margin: 10px 0;
        font-size: 18px;
        color: #555;
    }
    .product-details .price {
        font-size: 22px;
        color: #e74c3c;
        font-weight: bold;
    }
    .product-details .category {
        font-size: 16px;
        color: #888;
    }
    .buy-now-btn {
        display: inline-block;
        margin: 20px 0;
        padding: 10px 20px;
        font-size: 18px;
        color: #fff;
        background-color: #3498db;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .buy-now-btn:hover {
        background-color: #2980b9;
    }
</style>

<div class="product-container">
    <div class="product-image">
        <img src="{{asset('storage/'.$product->image)}}" alt="Title">
    </div>
    <div class="product-details">
        <h4>{{$product->name}}</h4>
        <p>{{$product->description}}</p>
        <p class="quantity">Available: {{$product->quantity}}</p>
        <p class="price">${{$product->price}}</p>
        <p class="category">Category: {{$product->category->name}}</p>
        <a href="#" class="buy-now-btn">Buy Now</a>
    </div>
</div>

    
    
    

@endsection

