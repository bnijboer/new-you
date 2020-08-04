<?php

namespace App\Http\Controllers;

use App\Meal;
use App\Product;

class MealController extends Controller
{
    public function index()
    {
        $meals = auth()->user()->meals()->get();

        return view('meals.index', [
            'meals' => $meals,
            'totalIntake' => auth()->user()->totalIntake($meals)
        ]);
    }

    public function create()
    {
        return view('meals.create');
    }

    public function store()
    {
        $meal = new Meal($this->validateMeal());
        $meal->user_id = auth()->id();
        $meal->save();

        $meal->products()->attach(Product::find(1));

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
