@extends('layouts.landing')
    
@section('title', 'Login')

@section('content')

    <div class="flex justify-center text-center">
        <div class="w-1/3 rounded-lg">
            @include('_logo')
            
            <div class="text-5xl text-white font-bold uppercase">
                Want to get in shape?
            </div>
            <div class="text-lg font-semibold text-gray-300 py-4">
                New You offers an easy way to track your nutritional intake!
            </div>
            <div class="pt-4 pb-8">
                <a
                    class="bg-green-500 hover:bg-green-700 text-white font-bold rounded-full uppercase px-5 py-3 focus:outline-none"
                    href="{{ route('register') }}"
                >
                    Sign Up
                </a>
            </div>
            
        </div>
    </div>
    
    <div class="flex justify-center text-center mt-12">
        <div class="w-1/4 bg-green-100 border border-gray-200 rounded-lg shadow-lg pt-5">

            <div class="text-xl font-semibold text-gray-700">
                Already have an account?
            </div>

            <div class="flex justify-center pt-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="my-6">
                        <label
                            for="username"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        >
                            Username
                        </label>

                        <input
                            class="border border-gray-400 p-2 w-full"
                            type="text"
                            name="username"
                            id="username"
                            autocomplete="username"
                            value="{{ old('username') }}"
                            required
                        >

                        @error('username')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label
                            for="password"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        >
                            Password
                        </label>

                        <input
                            class="border border-gray-400 p-2 w-full"
                            type="password"
                            name="password"
                            id="password"
                            autocomplete="current-password"
                            required
                        >

                        @error('password')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-8">
                        <div>
                            <input
                                class="mr-1"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            >

                            <label
                                for="remember"
                                class="text-xs text-gray-700 font-bold uppercase"
                            >
                                Remember Me
                            </label>
                        </div>

                        @error('remember')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-center mb-4">
                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold rounded-full uppercase px-5 py-3 focus:outline-none"
                        >
                            Log In
                        </button>
                    </div>
                    
                    <div class="flex justify-center mb-4">
                        <a
                            href="{{ route('password.request') }}"
                            class="text-xs text-gray-700"
                        >
                            Forgot Your Password?
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection