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
        
        $diet->save();
        
        $diet->activate();
        
        return redirect()->route('dashboard')->with('success', 'Diet started!');
    }
    
    public function show(Diet $diet)
	{
        abort_if($diet->isNot(currentDiet()), 404);
        
		return view('diets.show', [
			'diet' => $diet
		]);
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


