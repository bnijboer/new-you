@extends('layouts.landing')
    
@section('title', 'Register')

@section('content')

    <div class="text-center">
        @include('_logo')
    </div>
    
    <div class="flex justify-center text-center mt-6 mx-4 pb-6">
        <div class="xl:w-1/3 bg-green-100 border border-gray-200 rounded-lg shadow-lg pt-5">
        
            <div class="text-xl font-semibold text-gray-700">
                Create your account
            </div>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="md:flex md:justify-around pt-4">
                    
                    <div class="md:w-1/2 justify-center px-12">
                        <div class="py-6">
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
                        
                        <div class="pb-6">
                            <label
                                for="email"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Email
                            </label>

                            <input
                                class="border border-gray-400 p-2 w-full"
                                type="email"
                                name="email"
                                id="email"
                                autocomplete="email"
                                value="{{ old('email') }}"
                                required
                            >

                            @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="pb-6">
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
                                autocomplete="new-password"
                                required
                            >

                            @error('password')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="pb-6">
                            <label
                                for="password-confirm"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Confirm Password
                            </label>

                            <input
                                class="border border-gray-400 p-2 w-full"
                                type="password"
                                name="password_confirmation"
                                id="password-confirm"
                                autocomplete="new-password"
                                required
                            >

                            @error('password-confirm')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="md:w-1/2 justify-center px-12">
                        <div class="mb-6 md:mt-6">
                            <div class="flex justify-center">
                                <div>
                                    <label
                                        for="male"
                                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                    >
                                        Male
                                    </label>
                                    <input
                                        type="radio"
                                        id="male"
                                        name="gender"
                                        value="male"
                                        @if(old('gender') === 'male') {{ "checked" }} @endif
                                    >
                                </div>
                                <div class="ml-6">
                                    <label
                                        for="female"
                                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                    >
                                        Female
                                    </label>
                                    <input
                                        type="radio"
                                        class="border border-gray-400 p-2 w-full"
                                        id="female"
                                        name="gender"
                                        value="female"
                                        @if(old('gender') === 'female') {{ "checked" }} @endif
                                    >
                                </div>
                            </div>

                            @error('gender')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        
                        <div class="mb-6">
                            <label
                                for="age"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Age
                            </label>

                            <input
                                id="age"
                                type="number"
                                class="border border-gray-400 p-2 w-full"
                                name="age" value="{{ old('age') }}"
                                autocomplete="age"
                                required
                            >

                            @error('age')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label
                                for="height"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Height in cm
                            </label>

                            <input
                                id="height"
                                type="number"
                                class="border border-gray-400 p-2 w-full"
                                name="height"
                                value="{{ old('height') }}"
                                autocomplete="height"
                                required
                            >

                            @error('height')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label
                                for="current_weight"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Current weight in kg
                            </label>

                            <input
                                id="current_weight"
                                type="number"
                                class="border border-gray-400 p-2 w-full"
                                name="current_weight"
                                value="{{ old('current_weight') }}"
                                autocomplete="current_weight"
                                required
                            >

                            @error('current_weight')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-8">
                            <label
                                for="activity_level"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Current activity level
                            </label>
                            
                            <select
                                id="activity_level"
                                name="activity_level"
                                class="bg-white border border-gray-400 p-2 w-full"
                                autocomplete="activity_level"
                                required
                            >
                                <option
                                    value="1.2"
                                    @if(old('activity_level') === '1.2') {{ "selected='selected'" }} @endif
                                >
                                    {{ formatActivityLevel(1.2) }}
                                </option>
                                <option
                                    value="1.375"
                                    @if(old('activity_level') === '1.375') {{ "selected='selected'" }} @endif
                                >
                                    {{ formatActivityLevel(1.375) }}
                                </option>
                                <option
                                    value="1.55"
                                    @if(old('activity_level') === '1.55') {{ "selected='selected'" }} @endif
                                >
                                    {{ formatActivityLevel(1.55) }}
                                </option>
                                <option
                                    value="1.725"
                                    @if(old('activity_level') === '1.725') {{ "selected='selected'" }} @endif
                                >
                                    {{ formatActivityLevel(1.725) }}
                                </option>
                                <option
                                    value="1.9"
                                    @if(old('activity_level') === '1.9') {{ "selected='selected'" }} @endif
                                >
                                    {{ formatActivityLevel(1.9) }}
                                </option>
                            </select>

                            @error('activity_level')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
        
                <div class="flex justify-between mb-4 px-12">
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
                        Register
                    </button>
                </div>
                
            </form>
            
        </div>
    </div>
    
@endsection