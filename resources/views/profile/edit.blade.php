@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

    <div class="flex">
        <div class="bg-pink-300 rounded-lg w-1/3 p-4 mx-auto">
            <div class="text-center text-2xl py-2">
                Edit Your Profile
            </div>

            <div class="flex justify-center mt-8">
                <form action="/profile/{{ currentUser()->id }}" method="POST">
                    @csrf
                    @method('patch')

                    <div>
                        <div>
                            <input type="radio" id="male" name="gender" value="male" {{ (currentUser()->gender === 'male') ?
                            "checked" : '' }}>
                            <label for="male">Male</label><br>
                            <input type="radio" id="female" name="gender" value="female" {{ (currentUser()->gender ===
                            'female') ? "checked" : '' }}>
                            <label for="female">Female</label><br>
                        </div>

                        @error('gender')
                            <div>
                                <span class="text-red-500 text-sm">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div>
                            <input class="p-2 border border-gray-300 rounded-lg" type="number" name="age"
                                placeholder="Age" value="{{ currentUser()->age }}">
                        </div>

                        @error('age')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div>
                            <input class="p-2 border border-gray-300 rounded-lg" type="number" name="height"
                                placeholder="Height in cm" value="{{ currentUser()->height }}">
                        </div>

                        @error('height')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div>
                            <input class="p-2 border border-gray-300 rounded-lg" type="number" name="current_weight"
                                placeholder="Current weight in kg" value="{{ currentUser()->current_weight }}">
                        </div>

                        @error('current_weight')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div>
                            <input class="p-2 border border-gray-300 rounded-lg" type="number" name="target_weight"
                                placeholder="Target weight in kg" value="{{ currentUser()->target_weight }}">
                        </div>

                        @error('target_weight')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div>
                            <label for="diet_intensity">Preferred diet intensity:</label>
                            <input type="range" id="diet_intensity" name="diet_intensity" min="1" max="10"
                                value="{{ currentUser()->diet_intensity }}">
                        </div>

                        @error('diet_intensity')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-6 mb-3">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                            type="submit">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection