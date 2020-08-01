<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
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
            'carbohydrates' => 'required'
        ]);

        Product::create([
            'name' => $attributes['name'],
            'energy' => $attributes['energy'],
            'protein' => $attributes['protein'],
            'fat' => $attributes['fat'],
            'carbs' => $attributes['carbohydrates']
        ]);

        return back();
    }
}
