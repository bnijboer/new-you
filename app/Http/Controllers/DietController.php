<?php

namespace App\Http\Controllers;

use App\Diet;

class DietController extends Controller
{
    public function create()
    {
        return view('diets.create');
    }
    
    public function store()
	{
        $diet = Diet::make($this->validateDiet());
        
        $diet->user_id = auth()->id();
        $diet->ends_at = $diet->getEndDate();
        
        $diet->save();
        
        currentUser()->activateDiet($diet);
        
        return redirect()->route('dashboard');
    }
    
    private function validateDiet()
    {
        return request()->validate([
			'starting_weight' => ['required', 'numeric', 'digits_between:1,4', 'min:1', 'max:700'],
			'target_weight' => ['required', 'numeric', 'digits_between:1,4', 'min:1', 'max:700'],
			'activity_level' => ['required', 'numeric', 'min:1'],
            'diet_intensity' => ['required', 'numeric', 'min:1', 'max:10']
		]);
    }
}
