@extends('layouts.app')

@section('title', 'Profile Settings')

@section('banner-text', 'Profile Settings')

@section('content')

    <div class="lg:w-1/3 mb-6 mx-auto">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="bg-indigo-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
                Edit Profile
            </div>
            
            <div class="py-4 px-6 text-gray-600">
                <form action="/profile/{{ $user->username }}" method="POST">
                    @csrf
                    @method('patch')
                    
                    <div class="my-6">
                        <div class="flex">
                            <div class="w-1/2">
                                <label
                                    for="email"
                                    class="uppercase font-bold text-xs text-gray-700"
                                >
                                    Email
                                </label>
                            </div>
                            <div class="w-1/2">  
                                <input
                                    class="border border-gray-400 p-2 w-full"
                                    type="email"
                                    name="email"
                                    autocomplete="email"
                                    value="{{ $user->email }}"
                                    required
                                >
                            </div>
                        </div>

                        @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="my-6">
                        <div class="flex">
                            <div class="w-1/2">
                                <span class="uppercase font-bold text-xs text-gray-700">
                                    Gender
                                </span>
                            </div>
                            <div class="w-1/2 flex">
                                <div>
                                    <label
                                        for="male"
                                        class="mr-2 font-semibold text-xs text-gray-700"
                                    >
                                        Male
                                    </label>
                                    <input
                                        class="p-2"
                                        type="radio"
                                        id="male"
                                        name="gender"
                                        value="male"
                                        @if($user->gender === 'male') {{ "checked" }} @endif
                                    >
                                </div>
                                <div class="ml-10">
                                    <label
                                        for="female"
                                        class="mr-2 font-semibold text-xs text-gray-700"
                                    >
                                        Female
                                    </label>
                                    <input
                                        class="p-2"
                                        type="radio"
                                        id="female"
                                        name="gender"
                                        value="female"
                                        @if($user->gender === 'female') {{ "checked" }} @endif
                                    >
                                </div>
                            </div>
                        </div>

                        @error('gender')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="my-6">
                        <div class="flex">
                            <div class="w-1/2">
                                <label
                                    for="age"
                                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                >
                                    Age
                                </label>
                            </div>
                            <div class="w-1/2">
                                <input
                                    class="border border-gray-400 p-2 w-20"
                                    type="number"
                                    name="age"
                                    autocomplete="age"
                                    value="{{ $user->age }}"
                                    required
                                >
                            </div>
                        </div>

                        @error('age')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="my-6">
                        <div class="flex">
                            <div class="w-1/2">
                                <label
                                    for="height"
                                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                >
                                    Height in cm
                                </label>
                            </div>
                            <div class="w-1/2">
                                <input
                                    class="border border-gray-400 p-2 w-20"
                                    type="number"
                                    name="height"
                                    autocomplete="height"
                                    value="{{ $user->height }}"
                                    required
                                >
                            </div>
                        </div>

                        @error('height')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="my-6">
                        <div class="flex">
                            <div class="w-1/2">
                                <label
                                    for="current_weight"
                                    class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                >
                                    Current Weight in kg
                                </label>
                            </div>
                            <div class="w-1/2">
                                <input
                                    class="border border-gray-400 p-2 w-20"
                                    type="number"
                                    name="current_weight"
                                    autocomplete="current_weight"
                                    value="{{ $user->current_weight }}"
                                    required
                                >
                            </div>
                        </div>

                        @error('current_weight')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    @if(!$user->onDiet())
                        <div class="my-6">
                            <div class="flex">
                                <div class="w-1/2">
                                    <label
                                        for="activity_level"
                                        class="block mb-2 uppercase font-bold text-xs text-gray-700"
                                    >
                                        Activity Level
                                    </label>
                                </div>
                                <div class="w-1/2">
                                    <select
                                        class="border border-gray-400 p-2 w-full"
                                        name="activity_level"
                                        required
                                    >
                                        <option
                                            value="1.2"
                                            @if($user->activity_level === 1.2) {{ "selected='selected'" }} @endif
                                        >
                                            {{ formatActivityLevel(1.2) }}
                                        </option>
                                        <option
                                            value="1.375"
                                            @if($user->activity_level === 1.375) {{ "selected='selected'" }} @endif
                                        >
                                            {{ formatActivityLevel(1.375) }}
                                        </option>
                                        <option
                                            value="1.55"
                                            @if($user->activity_level === 1.55) {{ "selected='selected'" }} @endif
                                        >
                                            {{ formatActivityLevel(1.55) }}
                                        </option>
                                        <option
                                            value="1.725"
                                            @if($user->activity_level === 1.725) {{ "selected='selected'" }} @endif
                                        >
                                            {{ formatActivityLevel(1.725) }}
                                        </option>
                                        <option
                                            value="1.9"
                                            @if($user->activity_level === 1.9) {{ "selected='selected'" }} @endif
                                        >
                                            {{ formatActivityLevel(1.9) }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            
                            @error('activity_level')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                    
                    <div class="mt-10 mb-3 text-center">
                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold rounded-full uppercase px-5 py-3"
                        >
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection