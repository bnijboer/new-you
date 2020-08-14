<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class DateController extends Controller
{
    public function index()
    {
        $oldestLogDate = currentUser()->logs()->orderByRaw('DATE_FORMAT(created_at, "%y-%m-%d")')->pluck('created_at')->first();
        $currentDate = Carbon::now();
        
        $dates = [];
        
        while ($oldestLogDate->lte($currentDate)) {
            $dates[] = $oldestLogDate->toDateString();
            $oldestLogDate->addDay();
        }
        
        $today = Carbon::now();
        
        return view('dates', [
            'today' => $today,
            'dates' => $dates
        ]);
    }
    
    public function show()
    {
        $date = '2020-08-13';
        
        return redirect()->route('dashboard', $date);
    }
}
