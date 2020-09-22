<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function __invoke()
    {
        if(auth()->check()) {
            return redirect()->route('dashboard');
        }
        
        return view('auth/login');
    }
}