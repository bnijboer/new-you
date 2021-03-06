@extends('layouts.landing')
    
@section('title', 'Reset Password')

@section('content')

<div class="h-screen">
    <div class="mx-auto">
        @include('_logo')  
    </div>
    
    <div class="w-5/6 md:w-1/3 lg:w-1/4 mx-auto text-center bg-green-100 border border-gray-200 rounded-lg shadow-lg mt-12">
        <div class="text-xl font-semibold text-gray-700 pt-5">
            Reset Password
        </div>
        
        <div>
            @if (session('status'))
                <p class="text-green-500">{{ $message }}</p>
                    {{ session('status') }}
                </p>
            @endif
        </div>
        <div class="pt-4 px-6">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mt-6 mb-8">
                    <label
                        for="email"
                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Email
                    </label>

                    <div>
                        <input
                            id="email"
                            type="email"
                            class="border border-gray-400 p-2 w-full"
                            name="email"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            required
                        >

                        @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-between mb-4">
                    <a
                        href="{{ route('landing') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold rounded-full uppercase px-5 py-3 focus:outline-none"
                    >
                        Back
                    </a>
                    <button
                        type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold rounded-full uppercase px-5 py-3 focus:outline-none"
                    >
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection