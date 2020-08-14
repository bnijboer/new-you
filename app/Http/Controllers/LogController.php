<?php

namespace App\Http\Controllers;

use App\Product;
use App\Log;
use Carbon\Carbon;

class LogController extends Controller
{
    public function index($shownDate = null)
    {
        if(!$shownDate) {
            $shownDate = Carbon::now();
        }
        
        return view('logs.index', [
            'shownDate' => $shownDate,
            'logs' => currentUser()->logsPerDate($shownDate),
            'totalIntake' => currentUser()->totalIntake($shownDate)
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
            'energy' => 'required',
            'protein' => 'required',
            'fat' => 'required',
            'carbs' => 'required'
        ]);

        Log::create([
            'user_id' => auth()->id(),
            'product_id' => request()->product_id,
            'energy' => round($attributes['energy']),
            'protein' => round($attributes['protein']),
            'fat' => round($attributes['fat']),
            'carbs' => round($attributes['carbs'])
        ]);        
        
        return redirect()->route('dashboard');
    }
}
