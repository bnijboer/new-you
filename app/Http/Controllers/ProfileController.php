<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
	public function show(User $user)
	{
        abort_if($user->isNot(currentUser()), 403);
        
		return view('profile.show', [
			'user' => $user
		]);
	}

	public function edit(User $user)
	{
        abort_if($user->isNot(currentUser()), 403);
        
		return view('profile.edit', [
			'user' => $user
		]);
	}

	public function update(User $user)
	{
		$validatedData = request()->validate([
            'username' => ['required', 'string', 'alpha_dash', 'max:255', Rule::unique('users')->ignore($user)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'gender' => ['required', 'string', 'max:6', 'alpha'],
            'age' => ['required', 'numeric', 'digits_between:1,3', 'min:0', 'max:127'],
            'height' => ['required', 'numeric', 'digits_between:1,3', 'min:0', 'max:300'],
            'current_weight' => ['required', 'numeric', 'digits_between:1,3', 'min:1', 'max:700'],
			'activity_level' => ['numeric', 'min:1'],
            'password'  => ['required', 'string', 'min:8', 'max:255', 'confirmed']
        ]);

        $user->update($validatedData);
		
        return redirect()->route('profile', [$user]);
	}
}
