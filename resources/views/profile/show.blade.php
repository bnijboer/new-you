@extends('layouts.app')

@section('title', 'Show Profile')

@section('content')

    <div class="flex">
        <div class="bg-pink-300 rounded-lg w-1/3 p-4 mx-auto">
            <div class="text-center text-2xl py-2">
                Your Profile
            </div>

            <div class="mt-8">

                <div class="flex justify-between">
                    <div class="font-bold">
                        Username:
                    </div>
                    <div>
                        {{ $user->username }}
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Email
                    </div>
                    <div>
                        {{ $user->email }}
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Gender:
                    </div>
                    <div>
                        {{ $user->gender }}
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Age:
                    </div>
                    <div>
                        {{ $user->age }}
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Height:
                    </div>
                    <div>
                        {{ $user->height }} cm
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Current weight:
                    </div>
                    <div>
                        {{ $user->current_weight }} kg
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="font-bold">
                        Activity level:
                    </div>
                    <div>
                        {{ formatActivityLevel($user->activity_level) }}
                    </div>
                </div>

                <div class="mt-6">
                    <div class="flex justify-end">
                        <div class="mr-3">
                            <form action="/profile/{{ $user->username }}/edit" method="GET">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    type="submit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>
                        </div>
                        <div class="mr-3">
                            <form action="/profile/{{ $user->username }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    type="submit"
                                    onclick="return confirm('Are you sure you want to delete your account? This action cannot be reversed.');">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection