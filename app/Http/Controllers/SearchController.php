<?php

namespace App\Http\Controllers;

use App\Product;

class SearchController extends Controller
{
    public function __invoke()
    {
        $products = Product::all();
        
        if(request()->query()) {
            $query = request()->query('query');
            $results = Product::where('name','LIKE','%' . $query . '%')->get();
            
            return view('search.index', [
                'results' => $results,
                'products' => $products
            ]);
        }
        
        return view('search.index', [
            'products' => $products
        ]);
    }
}