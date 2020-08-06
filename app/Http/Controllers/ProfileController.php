<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class ProfileController extends Controller
{
	public function show(User $user)
	{
		return view('profile.show', [
			'user' => $user
		]);
	}

	public function edit(User $user)
	{
		return view('profile.edit', [
			'user' => $user
		]);
	}

	public function update(User $user)
	{
		$attributes = request()->validate([
			'gender' => 'required',
			'age' => 'required',
			'height' => 'required',
			'current_weight' => 'required',
			'target_weight' => 'required',
			'diet_intensity' => 'required'
		]);

		$user->update($attributes);

		return redirect()->route('profile', [$user]);
	}

	public function destroy(User $user)
	{
		Auth::logout();
		$user->delete();

		return redirect()->route('landing');
	}
}
