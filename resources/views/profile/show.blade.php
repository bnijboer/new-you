@extends('layouts.app')

@section('title', 'Show Profile')

@section('banner-text', 'Your Profile')

@section('content')

    <div class="lg:w-1/3 mb-6 mx-auto">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="bg-indigo-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
                Profile of {{ $user->username }}
            </div>
            
            <div class="justify-center py-4 px-6 text-gray-600">
                
                <div class="my-6 flex">
                    <div class="w-1/2">                    
                        <span class="uppercase font-bold text-xs text-gray-700">
                            Username
                        </span>
                    </div>
                    <div class="w-1/2">
                        {{ $user->username }}
                    </div>
                </div>
                <div class="my-6 flex">
                    <div class="w-1/2">                    
                        <span class="uppercase font-bold text-xs text-gray-700">
                            Email
                        </span>
                    </div>
                    <div class="w-1/2">
                        {{ $user->email }}
                    </div>
                </div>
                <div class="my-6 flex">
                    <div class="w-1/2">                    
                        <span class="uppercase font-bold text-xs text-gray-700">
                            Gender
                        </span>
                    </div>
                    <div class="w-1/2">
                        {{ $user->gender }}
                    </div>
                </div>
                <div class="my-6 flex">
                    <div class="w-1/2">                    
                        <span class="uppercase font-bold text-xs text-gray-700">
                            Age
                        </span>
                    </div>
                    <div class="w-1/2">
                        {{ $user->age }}
                    </div>
                </div>
                <div class="my-6 flex">
                    <div class="w-1/2">                    
                        <span class="uppercase font-bold text-xs text-gray-700">
                            Height
                        </span>
                    </div>
                    <div class="w-1/2">
                        {{ $user->height }} cm
                    </div>
                </div>
                <div class="my-6 flex">
                    <div class="w-1/2">                    
                        <span class="uppercase font-bold text-xs text-gray-700">
                            Weight
                        </span>
                    </div>
                    <div class="w-1/2">
                        {{ $user->current_weight }} kg
                    </div>
                </div>
                <div class="my-6 flex">
                    <div class="w-1/2">                    
                        <span class="uppercase font-bold text-xs text-gray-700">
                            Activity Level
                        </span>
                    </div>
                    <div class="w-1/2">
                        {{ formatActivityLevel($user->activity_level) }}
                    </div>
                </div>
                <div class="mt-12 mb-4 text-center">
                    <a
                        class="bg-orange-400 hover:bg-orange-500 focus:bg-orange-500 text-white font-bold rounded-full uppercase px-5 py-3"
                        href="/profile/{{ $user->username }}/edit"
                    >
                        Edit
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection