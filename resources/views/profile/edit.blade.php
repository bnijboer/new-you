@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

    <div class="flex">
        <div class="bg-pink-300 rounded-lg w-1/3 p-4 mx-auto">
            <div class="text-center text-2xl py-2">
                Edit Your Profile
            </div>

            <div class="flex justify-center mt-8">
                
                <form action="/profile/{{ $user->username }}" method="POST">
                    @csrf
                    @method('patch')

                    <div>
                        <div>
                            <input type="radio" id="male" name="gender" value="male" @if($user->gender === 'male') {{ "checked" }} @endif>
                            <label for="male">Male</label><br>
                            <input type="radio" id="female" name="gender" value="female" @if($user->gender === 'female') {{ "checked" }} @endif>
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
                                placeholder="Age" value="{{ $user->age }}" required>
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
                                placeholder="Height in cm" value="{{ $user->height }}" required>
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
                                placeholder="Current weight in kg" value="{{ $user->current_weight }}" required>
                        </div>

                        @error('current_weight')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div>
                            <label for="activity_level">Current activity level:</label>
                            <select
                                id="activity_level"
                                name="activity_level"
                                required
                                autocomplete="activity_level"
                                autofocus
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

                        @error('activity_level')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="flex justify-end mt-6 mb-3">
                        <button
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                            type="submit"
                        >
                            Save
                        </button>
                    </div>

                </form>
                
            </div>
        </div>
    </div>

@endsection