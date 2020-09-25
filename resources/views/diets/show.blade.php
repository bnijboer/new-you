@extends('layouts.app')

@section('title', 'Your Diet')

@section('banner-text', 'Your Diet')

@section('content')

    <div class="lg:w-1/2 xl:w-1/3 bg-white rounded-lg shadow-lg mb-6 mx-auto">
        <div class="bg-indigo-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
            Your Current Diet
        </div>
        <div class="py-4 px-6 text-gray-600">
            <div class="my-6 flex">
                <div class="w-1/2">
                    <span class="uppercase font-bold text-xs text-gray-700">
                        Goal
                    </span>
                </div>
                <div class="w-1/2">
                    {{ (currentDiet()->starting_weight - currentDiet()->target_weight > 0) ? 'Lose' : 'Gain' }}
                    {{ abs(currentDiet()->starting_weight - currentDiet()->target_weight) }} kg
                </div>
            </div>
            <div class="my-6 flex">
                <div class="w-1/2">
                    <span class="uppercase font-bold text-xs text-gray-700">
                        Starting Weight
                    </span>
                </div>
                <div class="w-1/2">
                    {{ currentDiet()->starting_weight }} kg
                </div>
            </div>
            <div class="my-6 flex">
                <div class="w-1/2">
                    <span class="uppercase font-bold text-xs text-gray-700">
                        Current Weight
                    </span>
                </div>
                <div class="w-1/2">
                    {{ currentUser()->current_weight }} kg
                </div>
            </div>
            <div class="my-6 flex">
                <div class="w-1/2">
                    <span class="uppercase font-bold text-xs text-gray-700">
                        Target Weight
                    </span>
                </div>
                <div class="w-1/2">
                    {{ currentDiet()->target_weight }} kg
                </div>
            </div>
            <div class="my-6 flex">
                <div class="w-1/2">
                    <span class="uppercase font-bold text-xs text-gray-700">
                        End Date
                    </span>
                </div>
                <div class="w-1/2">
                    {{ currentDiet()->ends_at->format('D, d M. Y') }}
                </div>
            </div>
            <div class="my-6 flex">
                <div class="w-1/2">
                    <span class="uppercase font-bold text-xs text-gray-700">
                        Total Duration
                    </span>
                </div>
                <div class="w-1/2">
                    {{ currentDiet()->duration }} days
                </div>
            </div>
            <div class="my-6 flex">
                <div class="w-1/2">
                    <span class="uppercase font-bold text-xs text-gray-700">
                        Days Left
                    </span>
                </div>
                <div class="w-1/2">
                    {{ currentDiet()->daysLeft }} days
                </div>
            </div>
            <div class="mt-12 mb-4 text-center">
                <form action="/diets/end" method="POST">
                    @csrf
                    @method('patch')
                    
                    <button
                        type="submit"
                        onclick="return confirm('Are you sure you want to end your diet?');"
                        class="bg-red-400 hover:bg-red-500 focus:bg-red-500 text-white font-bold rounded-full uppercase px-5 py-3"
                    >
                        End Diet
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection