@extends('layouts.app')

@section('title', 'Create New Diet')

@section('content')

    <div class="flex">

        <div class="bg-indigo-100 rounded-lg w-1/3 p-4 mx-auto">
            <div class="text-center text-2xl py-2">
                Create New Diet
            </div>

            <div class="flex justify-center mt-8">
                <form action="/diets" method="POST">
                    @csrf

                    <div>
                        <label for="starting_weight" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Starting weight in kg
                        </label>

                        <input id="starting_weight" type="number" name="starting_weight" value="{{ currentUser()->current_weight }}" required autocomplete="starting_weight" autofocus>

                        @error('starting_weight')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mt-6">
                        <label for="target_weight" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Target weight in kg
                        </label>

                        <input id="target_weight" type="number" name="target_weight" value="{{ old('target_weight') }}" required autocomplete="target_weight" autofocus>

                        @error('target_weight')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <label for="activity_level" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Current activity level
                        </label>
                        
                        <select
                            id="activity_level"
                            name="activity_level"
                            required
                            autocomplete="activity_level"
                            autofocus
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

                    <div class="mt-6">
                        <label for="diet_intensity" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Preferred diet intensity
                        </label>
                        
                        <input
                            id="diet_intensity"
                            type="range"
                            name="diet_intensity"
                            min="1"
                            max="10"
                            value="{{ old('diet_intensity') }}"
                            required autocomplete="diet_intensity"
                            autofocus>
                        
                        @error('diet_intensity')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-6 mb-3">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Add</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection