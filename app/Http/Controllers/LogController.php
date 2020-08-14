<?php

namespace App\Http\Controllers;

use App\Product;
use App\Log;
use Carbon\Carbon;

class LogController extends Controller
{
    public function index()
    {
        if (request()->input('date') !== null) {
            
            $validated = request()->validate([
                'date' => ['required', 'date']
            ]);
            
            $date = Carbon::createFromFormat('Y-m-d', $validated['date']);
            
        } else {
            $date = Carbon::now();
        }
        
        return view('logs.index', [
            'date' => $date,
            'logs' => currentUser()->logsOnDate($date),
            'totalIntake' => currentUser()->intakeOnDate($date)
        ]);
    }
    
    public function create()
    {
        return view('logs.create', [
            'product' => Product::find(request()->id)
        ]);
    }
    
    public function store()
    {
        $attributes = request()->validate([
            'energy' => ['required', 'numeric', 'digits_between:1,5', 'min:0'],
            'protein' => ['required', 'numeric', 'digits_between:1,4', 'min:0'],
            'fat' => ['required', 'numeric', 'digits_between:1,4', 'min:0'],
            'carbs' => ['required', 'numeric', 'digits_between:1,4', 'min:0']
        ]);

        Log::create([
            'user_id' => auth()->id(),
            'product_id' => request()->product_id,
            'energy' => $attributes['energy'],
            'protein' => $attributes['protein'],
            'fat' => $attributes['fat'],
            'carbs' => $attributes['carbs']
        ]);        
        
        return redirect()->route('dashboard');
    }
}
