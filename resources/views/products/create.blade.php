@extends('layouts.app')

@section('title', 'New Product')

@section('banner-text', 'New Product')

@section('content')

        <div class="w-5/6 md:w-1/3 rounded-lg shadow-lg mx-auto">
        
            <div class="bg-indigo-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
                Enter Details
            </div>

            <div class="py-4 px-6 text-gray-600">
                <form action="/products" method="POST">
                    @csrf

                    <div class="flex my-6 items-center">
                        <div class="w-1/2">
                            <label
                                for="name"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Product name
                            </label>
                        </div>
                        <div class="w-1/2">
                            <input
                                class="w-full border border-gray-400 p-2"
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                required
                            >

                            @error('name')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex my-6 items-center">
                        <div class="w-1/2">
                            <label
                                for="brand"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Brand (optional)
                            </label>
                        </div>
                        <div class="w-1/2">
                            <input
                                class="w-full border border-gray-400 p-2"
                                type="text"
                                name="brand"
                                id="brand"
                                value="{{ old('brand') }}"
                            >

                            @error('brand')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex my-6 items-center">
                        <div class="w-1/2">
                            <label
                                for="energy"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Energy in kcal
                            </label>
                        </div>
                        <div class="w-1/2">
                            <input
                                class="w-20 w-20 border border-gray-400 p-2"
                                type="number"
                                name="energy"
                                id="energy"
                                value="{{ old('energy') }}"
                                required
                            >

                            @error('energy')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex my-6 items-center">
                        <div class="w-1/2">
                            <label
                                for="protein"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Protein in grams
                            </label>
                        </div>
                        <div class="w-1/2">
                            <input
                                class="w-20 border border-gray-400 p-2"
                                type="number"
                                name="protein"
                                id="protein"
                                value="{{ old('protein') }}"
                                required
                            >

                            @error('protein')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex my-6 items-center">
                        <div class="w-1/2">
                            <label
                                for="fat"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Fat in grams
                            </label>
                        </div>
                        <div class="w-1/2">
                            <input
                                class="w-20 border border-gray-400 p-2"
                                type="number"
                                name="fat"
                                id="fat"
                                value="{{ old('fat') }}"
                                required
                            >

                            @error('fat')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex my-6 items-center">
                        <div class="w-1/2">
                            <label
                                for="carbs"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Carbs in grams
                            </label>
                        </div>
                        <div class="w-1/2">
                            <input
                                class="w-20 border border-gray-400 p-2"
                                type="number"
                                name="carbs"
                                id="carbs"
                                value="{{ old('carbs') }}"
                                required
                            >

                            @error('carbs')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="flex my-6 items-center">
                        <div class="w-1/2">
                            <label
                                for="quantity"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Quantity in kcal
                            </label>
                        </div>
                        <div class="w-1/2">
                            <input
                                class="w-20 border border-gray-400 p-2"
                                type="number"
                                name="quantity"
                                id="quantity"
                                value="{{ old('quantity') }}"
                                required
                            >

                            @error('quantity')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mt-10 mb-3 text-center">
                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold rounded-full uppercase px-5 py-3"
                        >
                            Save
                        </button>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>

@endsection