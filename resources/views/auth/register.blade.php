@extends('layouts.app')

@section('content')

<div class="mx-auto mt-12 flex justify-center">
    <div class="px-12 py-4 bg-blue-200 border border-gray-300 rounded-lg">
        <div class="font-bold text-center text-lg mb-4">{{ __('Register') }}</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="flex">

                <div class="w-1/2 mr-16">

                    <div class="mb-6">
                        <label for="first_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            First Name
                        </label>

                        <input id="first_name" type="text"
                            class="form-control @error('first_name') is-invalid @enderror" name="first_name"
                            value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                        @error('first_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="last_name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Last Name
                        </label>

                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                            name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                        @error('last_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Username
                        </label>

                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                        @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Email
                        </label>

                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Password
                        </label>

                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            value="{{ old('password') }}" required autocomplete="new-password" autofocus>

                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password-confirm" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Confirm Password
                        </label>

                        <input id="password-confirm" type="password"
                            class="form-control @error('password-confirm') is-invalid @enderror"
                            name="password_confirmation" value="{{ old('password-confirm') }}" required
                            autocomplete="new-password" autofocus>

                        @error('password-confirm')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="w-1/2">
                    <div class="mb-6">
                        <div class="flex">
                            <div>
                                <label for="male"
                                    class="block mb-2 uppercase font-bold text-xs text-gray-700">Male</label>
                                <input type="radio" id="male" name="gender" value="male">
                            </div>
                            <div class="ml-6">
                                <label for="female"
                                    class="block mb-2 uppercase font-bold text-xs text-gray-700">Female</label>
                                <input type="radio" id="female" name="gender" value="female">
                            </div>
                        </div>

                        @error('gender')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="age" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Age
                        </label>

                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age"
                            value="{{ old('age') }}" required autocomplete="age" autofocus>

                        @error('age')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="height" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Height in cm
                        </label>

                        <input id="height" type="number" class="form-control @error('height') is-invalid @enderror"
                            name="height" value="{{ old('height') }}" required autocomplete="height" autofocus>

                        @error('height')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="current_weight" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Current weight in kg
                        </label>

                        <input id="current_weight" type="number"
                            class="form-control @error('current_weight') is-invalid @enderror" name="current_weight"
                            value="{{ old('current_weight') }}" required autocomplete="current_weight" autofocus>

                        @error('current_weight')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="target_weight" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Target weight in kg
                        </label>

                        <input id="target_weight" type="number"
                            class="form-control @error('target_weight') is-invalid @enderror" name="target_weight"
                            value="{{ old('target_weight') }}" required autocomplete="target_weight" autofocus>

                        @error('target_weight')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-16">
                        <label for="diet_intensity" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Preferred diet intensity
                        </label>

                        <input id="diet_intensity" type="range"
                            class="form-control @error('diet_intensity') is-invalid @enderror" name="diet_intensity"
                            min="1" max="10" value="{{ old('diet_intensity') }}" required autocomplete="diet_intensity"
                            autofocus>

                        @error('diet_intensity')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('landing') }}" class="bg-gray-500 hover:bg-gray-600 text-white rounded px-5 py-3">
                    Back
                </a>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded px-5 py-3">
                    {{ __('Register') }}
                </button>
            </div>

        </form>
    </div>
</div>