<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;


class StoreController extends Controller
{

    public function index(Request $request)
{
    $categories = Category::query()->with('product')->has('product')->get();
    $name = $request->input('name');
    $categoriesIds = $request->input('categories');
    $max = $request->input('max');
    $min = $request->input('min');

    $productsQuery = Product::query();

    // Apply filters conditionally
    $productsQuery->when($name, function($query, $name) {
        return $query->where(function($q) use ($name) {
            $q->where('name', 'like', "%{$name}%")
              ->orWhere('description', 'like', "%{$name}%");
        });
    });

    $productsQuery->when($categoriesIds, function($query, $categoriesIds) {
        return $query->whereIn('category_id', $categoriesIds);
    });

    $productsQuery->when($max, function($query, $max) {
        return $query->where('price', '<=', $max);
    });

    $productsQuery->when($min, function($query, $min) {
        return $query->where('price', '>=', $min);
    });

    // If no filters are applied, sort by latest
    if (!$name && !$categoriesIds && !$max && !$min) {
        $productsQuery->latest();
    }

    $products = $productsQuery->get();
    return view('store.index', compact('products', 'categories'));
}








    public function show(Product $product){
        return view('store.show',compact('product'));

    }

}
