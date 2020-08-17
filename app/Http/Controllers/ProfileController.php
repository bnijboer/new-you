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
		$validatedData = request()->validate([
            'gender' => ['required', 'string', 'max:6', 'alpha'],
            'age' => ['required', 'numeric', 'digits_between:1,3', 'min:0', 'max:127'],
            'height' => ['required', 'numeric', 'digits_between:1,3', 'min:0', 'max:300'],
            'current_weight' => ['required', 'numeric', 'digits_between:1,3', 'min:1', 'max:700'],
			'activity_level' => ['required', 'numeric', 'digits_between:1,4', 'min:1', 'max:2']
		]);

		$user->update($validatedData);
		
        return redirect()->route('profile', [$user]);
	}

	public function destroy(User $user)
	{
		Auth::logout();
		$user->delete();

		return redirect()->route('landing');
	}
}
