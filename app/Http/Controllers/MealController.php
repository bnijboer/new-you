<?php

namespace App\Http\Controllers;

use App\Meal;

class MealController extends Controller
{
	public function index()
	{
		$allMeals = auth()->user()->meals()->get()->toArray();

		return view('meals.index', [
			'allMeals' => $allMeals,
			'totalIntake' => auth()->user()->totalIntake($allMeals)
		]);
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

		// $this->validateMeal();

		Meal::create([
			'user_id' => auth()->id(),
			'name' => $attributes['name'],
			'energy' => $attributes['energy'],
			'protein' => $attributes['protein'],
			'fat' => $attributes['fat'],
			'carbs' => $attributes['carbohydrates']
		]);

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
			'name' => 'required',
			'energy' => 'required',
			'protein' => 'required',
			'fat' => 'required',
			'carbs' => 'required'
		]);
	}
}
