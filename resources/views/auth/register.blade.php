<x-master>
    <div class="mx-auto mt-12 flex justify-center">
        <div class="px-12 py-4 bg-blue-200 border border-gray-300 rounded-lg">
            <div class="font-bold text-center text-lg mb-4">{{ __('Register') }}</div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="flex">

                    <div class="w-1/2 mr-16">

                        <div class="mb-6">
                            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Username
                            </label>

                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Email
                            </label>

                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Password
                            </label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password" autofocus>

                            @error('password')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="password-confirm" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Confirm Password
                            </label>

                            <input id="password-confirm" type="password" class="form-control @error('password-confirm') is-invalid @enderror" name="password_confirmation" value="{{ old('password-confirm') }}" required autocomplete="new-password" autofocus>

                            @error('password-confirm')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="w-1/2">
                        <div class="mb-6">
                            <div class="flex">
                                <div>
                                    <label for="male" class="block mb-2 uppercase font-bold text-xs text-gray-700">Male</label>
                                    <input type="radio" id="male" name="gender" value="male" @if(old('gender') === 'male') {{ "checked" }} @endif>
                                </div>
                                <div class="ml-6">
                                    <label for="female" class="block mb-2 uppercase font-bold text-xs text-gray-700">Female</label>
                                    <input type="radio" id="female" name="gender" value="female" @if(old('gender') === 'female') {{ "checked" }} @endif>
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

                            <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                            @error('age')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="height" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Height in cm
                            </label>

                            <input id="height" type="number" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required autocomplete="height" autofocus>

                            @error('height')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="current_weight" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Current weight in kg
                            </label>

                            <input id="current_weight" type="number" class="form-control @error('current_weight') is-invalid @enderror" name="current_weight" value="{{ old('current_weight') }}" required autocomplete="current_weight" autofocus>

                            @error('current_weight')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-16">
                            <label for="activity_level" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                                Current activity level
                            </label>
                            <select
                                class="form-control @error('activity_level') is-invalid @enderror"
                                id="activity_level"
                                name="activity_level"
                                required
                                autocomplete="activity_level"
                                autofocus
                            >
                                <option value="1.2" @if(old('activity_level') === '1.2') {{ "selected='selected'" }} @endif>1: Little or no exercise</option>
                                <option value="1.375" @if(old('activity_level') === '1.375') {{ "selected='selected'" }} @endif>2: Light exercise or sports 1-3 days/week</option>
                                <option value="1.55" @if(old('activity_level') === '1.55') {{ "selected='selected'" }} @endif>3: Moderate exercise 3-5 days/week</option>
                                <option value="1.725" @if(old('activity_level') === '1.725') {{ "selected='selected'" }} @endif>4: Hard exercise 6-7 days/week</option>
                                <option value="1.9" @if(old('activity_level') === '1.9') {{ "selected='selected'" }} @endif>5: Very hard exercise and a physical job</option>
                            </select>

                            @error('activity_level')
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
</x-master>