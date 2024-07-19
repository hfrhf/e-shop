<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {

        $products=Product::query()->with('category')->paginate(5);
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all() ;


        $update=false;
        $product=new Product();
        return view('product.create',compact('product','update','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $form=$request->validated();
        if ($request->hasFile('image')) {
            $form['image']= $request->file('image')->store('product','public');
        }
        Product::create($form);
        return to_route('product.index')->with('success','your product has added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
       // $product=new Product();
       $categories=Category::all() ;
       $update=true;
        return view('product.edit',compact('product','update','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $form=$request->validated();
        if ($request->hasFile('image')) {
            $form['image']= $request->file('image')->store('product','public');
        }
        $product->fill($form)->save();

        return to_route('product.index')->with('success','your product has updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('product.index')->with('success','your product has deleted');
    }
}
