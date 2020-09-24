<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        if(request()->query()) {
            $query = request()->query('query');
            $results = Product::where('name','LIKE','%' . $query . '%')->get();
            
            return view('products.index', [
                'results' => $results,
                'products' => $products
            ]);
        }

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
        Product::create($this->validateProduct());

        return redirect()->route('products')->with('success', 'Product added successfully!');
    }
    
    private function validateProduct()
    {
        return request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['nullable', 'string', 'max:255'],
            'energy' => ['required', 'numeric', 'digits_between:1,5', 'min:0'],
            'protein' => ['required', 'numeric', 'digits_between:1,4', 'min:0'],
            'fat' => ['required', 'numeric', 'digits_between:1,4', 'min:0'],
            'carbs' => ['required', 'numeric', 'digits_between:1,4', 'min:0'],
            'quantity' => ['required', 'numeric', 'digits_between:1,5', 'min:0']
		]);
    }
}
