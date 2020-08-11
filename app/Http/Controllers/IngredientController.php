<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function store()
    {
        $quantity = 2;
        
        $ingredient = Ingredient::create([
            'energy' => 1 * $quantity,
            'protein' => 2 * $quantity,
            'fat' => 3 * $quantity,
            'carbs' => 4 * $quantity
        ]);
    }
}
