<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    // public function index()
    // {
    //     $products = Product::all();

    //     return view('meals.test', [
    //         'products' => $products
    //     ]);
    // }
    
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
            'energy' => 'required',
            'protein' => 'required',
            'fat' => 'required',
            'carbs' => 'required',
            'quantity' => 'required'
        ]);

        Product::create([
            'name' => $attributes['name'],
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
    
    public function ajaxRequestPost(Request $request)
    {
        $input = $request->all();

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
    
    public function search(Request $request)
    {
        $q = $request->input('product_name');
        $products = Product::where('name','LIKE','%'.$q.'%')->get();
        
        return view('search.results', [
            'products' => $products
        ]);
    }
}
