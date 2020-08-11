<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }
    
    public function search(Request $request)
    {
        $q = $request->input('product_name');
        $products = Product::where('name','LIKE','%'.$q.'%')->get();
        
        return view('search.results', [
            'products' => $products
        ]);
    }
    
    public function store(Request $request)
    {
        $product = Product::find($request->id);
        
        return view('logs.create', [
            'product' => $product
        ]);
    }
}