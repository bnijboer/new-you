@extends('layouts.app')

@section('content')

<div class="container mx-auto mt-12 flex justify-center">
    <div class="px-12 py-8 bg-blue-200 border border-gray-300 rounded-lg">
        <div class="font-bold text-center text-lg mb-4">{{ __('Login') }}</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
                    Email
                </label>

                <input class="border border-gray-400 p-2 w-full" type="email" name="email" id="email"
                    autocomplete="email" value="{{ old('email') }}" required>

                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
                    Password
                </label>

                <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                    autocomplete="current-password" required>

                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-8">
                <div>
                    <input class="mr-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked'
                        : '' }}>

                    <label class="text-xs text-gray-700 font-bold uppercase" for="remember">
                        Remember Me
                    </label>
                </div>

                @error('remember')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between mb-4">
                <a href="{{ route('landing') }}" class="bg-gray-500 hover:bg-gray-600 text-white rounded px-5 py-3">
                    Back
                </a>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-5 py-3">
                    Submit
                </button>
            </div>

            <div class="flex justify-center">
                <a href="{{ route('password.request') }}" class="text-xs text-gray-700">Forgot Your Password?</a>
            </div>

        </form>

    </div>
</div>

@endsection