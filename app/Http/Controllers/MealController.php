<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Product;

class MealController extends Controller
{
    public function index()
    {
        
        $products = Product::all();
        $meals = currentUser()->meals()->get();

        return view('meals.index', [
            'products' => $products,
            'meals' => $meals,
            'totalIntake' => currentUser()->totalIntake($meals)
        ]);
    }

    public function create()
    {
        $products = Product::all();
        
        return view('meals.create', [
            'products' => $products
        ]);
    }

    public function store()
    {
        // $ids = request()->id;
        // dd($ids);
        
        $quantities = request()->quantity;
        dd($quantities);
        
        // $productIds = request()->productId;
        // dd(Product::find($productId[0]));
        
        $meal = new Meal($this->validateMeal());
        $meal->user_id = auth()->id();
        
        // foreach ($productIds as $productId) {
        //     $meal->products()->attach(Product::find($productId));
        // }
        
        $meal->save();

        return redirect()->route('dashboard');
    }

    public function show(Meal $meal)
    {
        return view('meals.show', [
            'meal' => $meal
        ]);
    }

    public function edit(Meal $meal)
    {
        return view('meals.edit', [
            'meal' => $meal
        ]);
    }

    public function update(Meal $meal)
    {
        $meal->update($this->validateMeal());

        return redirect()->route('dashboard');
    }

    public function destroy(Meal $meal)
    {
        $meal->delete();

        return redirect()->route('dashboard');
    }

    protected function validateMeal()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
