<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Auth;

class ProfileController extends Controller
{
	public function show(Profile $profile)
	{
		return view('profile.show', [
			'profile' => $profile
		]);
	}

	public function create()
	{
		return view('profile.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'gender' => 'required',
			'age' => 'required',
			'height' => 'required',
			'current_weight' => 'required',
			'target_weight' => 'required',
			'diet_intensity' => 'required'
		]);

		Profile::create([
			'user_id' => auth()->id(),
			'gender' => $attributes['gender'],
			'age' => $attributes['age'],
			'height' => $attributes['height'],
			'current_weight' => $attributes['current_weight'],
			'target_weight' => $attributes['target_weight'],
			'diet_intensity' => $attributes['diet_intensity']
		]);

		return redirect()->route('dashboard');
	}

	public function edit(Profile $profile)
	{
		return view('profile.edit', [
			'profile' => $profile
		]);
	}

	public function update(Profile $profile)
	{
		$attributes = request()->validate([
			'gender' => 'required',
			'age' => 'required',
			'height' => 'required',
			'current_weight' => 'required',
			'target_weight' => 'required',
			'diet_intensity' => 'required'
		]);

		$profile->update($attributes);

		return redirect()->route('profile', [$profile]);
	}

	public function destroy()
	{
		$user = User::find(Auth::user()->id);

		Auth::logout();
		$user->delete();

		return redirect()->route('register');
	}
}
