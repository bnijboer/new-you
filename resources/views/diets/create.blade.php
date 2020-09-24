@extends('layouts.app')

@section('title', 'Create Diet')

@section('banner-text', 'Create Diet')

@section('content')

    <div class="lg:w-1/2 xl:w-1/3 bg-white rounded-lg shadow-lg mb-6 mx-auto">
        <div class="bg-indigo-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
            Diet Specifications
        </div>
        <div class="py-4 px-6 text-gray-600">
            
            <form action="/diets" method="POST">
                @csrf
                
                <div class="flex my-6 items-center">
                    <div class="w-1/2">
                        <label
                            for="starting_weight"
                            class="uppercase font-bold text-xs text-gray-700"
                        >
                            Starting weight in kg
                        </label>
                    </div>
                    <div class="w-1/2">
                        <input
                            class="border border-gray-400 p-2 w-20"
                            type="number"
                            name="starting_weight"
                            id="starting_weight"
                            value="{{ currentUser()->current_weight }}"
                            required
                        >
                        
                        @error('starting_weight')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex my-6 items-center">
                    <div class="w-1/2">
                        <label
                            for="target_weight"
                            class="uppercase font-bold text-xs text-gray-700"
                        >
                            Target weight in kg
                        </label>
                    </div>
                    <div class="w-1/2">
                        <input
                            class="border border-gray-400 p-2 w-20"
                            type="number"
                            name="target_weight"
                            id="target_weight"
                            value="{{ old('target_weight') }}"
                            required
                        >
                        
                        @error('target_weight')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex my-6 items-center">
                    <div class="w-1/2">
                        <label
                            for="activity_level"
                            class="uppercase font-bold text-xs text-gray-700"
                        >
                            Activity Level
                        </label>
                    </div>
                    <div class="w-1/2">
                        <select
                            class="border border-gray-400 p-2 w-full"
                            name="activity_level"
                            id="activity_level"
                            required
                        >
                            <option
                                value="1.2"
                                @if(currentUser()->activity_level === 1.2) {{ "selected='selected'" }} @endif
                            >
                                {{ formatActivityLevel(1.2) }}
                            </option>
                            <option
                                value="1.375"
                                @if(currentUser()->activity_level === 1.375) {{ "selected='selected'" }} @endif
                            >
                                {{ formatActivityLevel(1.375) }}
                            </option>
                            <option
                                value="1.55"
                                @if(currentUser()->activity_level === 1.55) {{ "selected='selected'" }} @endif
                            >
                                {{ formatActivityLevel(1.55) }}
                            </option>
                            <option
                                value="1.725"
                                @if(currentUser()->activity_level === 1.725) {{ "selected='selected'" }} @endif
                            >
                                {{ formatActivityLevel(1.725) }}
                            </option>
                            <option
                                value="1.9"
                                @if(currentUser()->activity_level === 1.9) {{ "selected='selected'" }} @endif
                            >
                                {{ formatActivityLevel(1.9) }}
                            </option>
                        </select>
                        
                        @error('activity_level')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="flex my-6 items-center">
                    <div class="w-1/2">
                        <label
                            for="diet_intensity"
                            class="uppercase font-bold text-xs text-gray-700"
                        >
                            Preferred Diet Intensity
                        </label>
                    </div>
                    <div class="w-1/2">
                        <input
                            class="py-2"
                            type="range"
                            name="diet_intensity"
                            id="diet_intensity"
                            value="{{ old('diet_intensity') }}"
                            min="1"
                            max="10"
                            required
                        >
                        
                        @error('diet_intensity')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-10 mb-3 text-center">
                    <button
                        type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold rounded-full uppercase px-5 py-3"
                    >
                        Start
                    </button>
                </div>
                
            </form>
        </div>
    </div>

@endsection