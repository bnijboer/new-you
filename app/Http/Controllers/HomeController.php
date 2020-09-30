<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __invoke()
    {
        if(auth()->check()) {
            return redirect()->route('dashboard');
        }
        
        return view('auth/login');
    }
}