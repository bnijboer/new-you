<?php

namespace App\Http\Controllers;

class DietEndController extends Controller
{
    public function __invoke()
	{
        $user = currentUser();
        
        $user->current_diet = null;
        
		$user->save();
		
        return redirect()->route('dashboard')->with('success', 'Your have ended your diet.');
	}
}
