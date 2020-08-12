<?php

namespace App\Http\Controllers;

use App\Product;
use App\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        $logs = currentUser()->logs()->get();
        
        return view('logs.index', [
            'logs' => $logs,
            'totalIntake' => currentUser()->totalIntake($logs)
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
