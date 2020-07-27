<?php

namespace App\Http\Controllers;

use App\User;
use App\Meal;

class MealController extends Controller
{
	public function index()
	{
		$allMeals = User::find(1)->meals()->get()->toArray();

		return view('meals.index', [
			'allMeals' => $allMeals,
			'totalIntake' => User::find(1)->totalIntake($allMeals)
		]);
	}

	public function store()
	{
		$this->validateMeal();

		Meal::create([
			'user_id' => 1,
			'name' => request('name'),
			'energy' => request('energy'),
			'protein' => request('protein'),
			'fat' => request('fat'),
			'carbs' => request('carbs')
		]);

		return redirect('/meals');
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

		return redirect('/meals');
	}

	public function destroy(Meal $meal)
	{
		$meal->delete();

		return redirect('/meals');
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

	public function totalEnergy()
	{
		$totalEnergy = Meal::select('energy')->get();

		return $totalEnergy;
	}
}
