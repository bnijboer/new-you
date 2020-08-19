<?php

namespace App\Http\Controllers;

use App\Log;

class LogController extends Controller
{
    public function index()
    {
        if (request()->has('date')) {
            
            $validated = request()->validate([
                'date' => ['required', 'date']
            ]);
            
            $shownDate = \Carbon\Carbon::createFromFormat('Y-m-d', $validated['date']);
            
        } else {
            $shownDate = currentDate();
        }
        
        return view('logs.index', [
            'shownDate' => $shownDate,
            'logs' => currentUser()->logsOnDate($shownDate),
            'totalIntake' => currentUser()->intakeOnDate($shownDate),
            'requiredIntake' => currentUser()->requiredIntake(currentUser()->bmr())
        ]);
    }
    
    public function create()
    {
        return view('logs.create', [
            'product' => \App\Product::find(request()->id)
        ]);
    }
    
    public function store()
    {
        $log = Log::make($this->validateLog());
        
        $log->user_id = auth()->id();
        $log->product_id = request()->product_id;
        
        $log->save();
        
        return redirect()->route('dashboard');
    }
    
    private function validateLog()
    {
        return request()->validate([
            'energy' => ['required', 'numeric', 'digits_between:1,5', 'min:0'],
            'protein' => ['required', 'numeric', 'digits_between:1,4', 'min:0'],
            'fat' => ['required', 'numeric', 'digits_between:1,4', 'min:0'],
            'carbs' => ['required', 'numeric', 'digits_between:1,4', 'min:0']
		]);
    }
}
