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
        
        // Diet activation is handled in a separate controller action, in case I add the option of users being able to create a diet and select a date on which the diet should be activated. 
        return redirect()->route('activate_diet', $diet);
    }
    
    public function show(Diet $diet)
	{
        abort_if($diet->isNot(currentDiet()), 404);
        
		return view('diets.show', [
			'diet' => $diet
		]);
    }
    
    public function update(Diet $diet)
    {
        $diet->ends_at = $diet->endDate;
        
        $diet->update();
        
        currentUser()->activateDiet($diet);
        
        return redirect()->route('dashboard')->with('success', 'Diet started!');
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


