<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', [
            'products' => $products
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required',
            'brand' => 'required',
            'energy' => 'required',
            'protein' => 'required',
            'fat' => 'required',
            'carbs' => 'required',
            'quantity' => 'required'
        ]);

        Product::create([
            'name' => $attributes['name'],
            'brand' => $attributes['brand'],
            'energy' => $attributes['energy'],
            'protein' => $attributes['protein'],
            'fat' => $attributes['fat'],
            'carbs' => $attributes['carbs'],
            'quantity' => $attributes['quantity']
        ]);

        return redirect()->route('products');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products');
    }
}
