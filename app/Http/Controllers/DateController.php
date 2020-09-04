<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class DateController extends Controller
{
    public function store()
    {
        if (request()->previous) {
            
            $validated = request()->validate([
                'previous' => ['required', 'date']
            ]);
            
            $date = Carbon::createFromFormat('Y-m-d', $validated['previous']);
            $date->subDays(1);
            
        } elseif (request()->next) {
            
            $validated = request()->validate([
                'next' => ['required', 'date']
            ]);
            
            $date = Carbon::createFromFormat('Y-m-d', $validated['next']);
            
            if (! $date->isSameDay(currentDate())) {
                $date->addDays(1);
            }
            
        } elseif (request()->date) {
            
            $validated = request()->validate([
                'date' => ['required', 'date']
            ]);
            
            $date = Carbon::createFromFormat('Y-m-d', $validated['date']);
        }
       
        return redirect()->route('dashboard', ['date' => $date->toDateString()]);
    }
}
