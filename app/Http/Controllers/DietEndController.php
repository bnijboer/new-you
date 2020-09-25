<?php

namespace App\Http\Controllers;

class DietEndController extends Controller
{
    public function store()
	{
        currentUser()->endDiet();
		
        return redirect()->route('dashboard')->with('success', 'Your have ended your diet.');
    }
    
    public function update()
	{
        $validatedData = request()->validate([
            'current_weight' => ['required', 'numeric', 'digits_between:1,3', 'min:1', 'max:700']
        ]);

        currentUser()->update($validatedData);
		
        return redirect()->route('dashboard')->with('success', 'Your weight has been updated.');
	}
}