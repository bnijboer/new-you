@extends('layouts.app')

@section('title', 'All Dates')

@section('content')

<div class="flex">
        <div class="w-1/2 bg-pink-300 rounded-lg p-4 mx-4">
        
            <div class="text-center text-2xl py-2">
            
                Today:
                
                <form action="/{{ $today->addDay() }}"
                <button type="submit">{{ $today->addDay() }}</button>
            </div>
            
            <div class="text-center text-2xl py-2">
                All Dates
            </div>
            
            <div>
                @foreach ($dates as $date)
                    <div>
                        <a href="{{ route('dashboard', $date) }}">
                            {{ $date }}
                        </a>
                    </div>
                @endforeach
            </div>
            
        </div>

@endsection