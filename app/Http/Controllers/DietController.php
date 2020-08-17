<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DietController extends Controller
{
    public function update(User $user)
	{
		$validatedData = request()->validate([
			'current_weight' => ['required', 'numeric', 'digits_between:1,4', 'min:1', 'max:700'],
			'target_weight' => ['required', 'numeric', 'digits_between:1,4', 'min:1', 'max:700'],
            'diet_intensity' => ['required', 'numeric', 'min:1', 'max:10'],
			'activity_level' => ['required', 'numeric', 'digits_between:1,4', 'min:1', 'max:2']
		]);

		$user->update($validatedData);
		
        return redirect()->route('profile', [$user]);
	}
}
