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
    
    public function search()
    {
        $query = request()->query('query');
        $products = Product::where('name','LIKE','%' . $query . '%')->get();
        
        return view('search.index', [
            'results' => $products
        ]);
    }
}