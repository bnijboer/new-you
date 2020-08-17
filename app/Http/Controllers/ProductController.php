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
        $validatedData = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['nullable', 'string', 'max:255'],
            'energy' => ['required', 'numeric', 'digits_between:1,5', 'min:0'],
            'protein' => ['required', 'numeric', 'digits_between:1,4', 'min:0'],
            'fat' => ['required', 'numeric', 'digits_between:1,4', 'min:0'],
            'carbs' => ['required', 'numeric', 'digits_between:1,4', 'min:0'],
            'quantity' => ['required', 'numeric', 'digits_between:1,5', 'min:0']
        ]);

        Product::create([
            'name' => $validatedData['name'],
            'brand' => $validatedData['brand'],
            'energy' => $validatedData['energy'],
            'protein' => $validatedData['protein'],
            'fat' => $validatedData['fat'],
            'carbs' => $validatedData['carbs'],
            'quantity' => $validatedData['quantity']
        ]);

        return redirect()->route('products');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products');
    }
}
