@extends('layouts.app')

@section('title', 'New Product')

@section('banner-text', 'New Product')

@section('content')

    <div class="flex justify-center">
        <div class="w-1/3 bg-blue-100 text-center rounded-lg shadow-lg pt-5">
        
            <div class="text-xl font-semibold text-gray-700">
                Enter Product Details
            </div>

            <div class="flex justify-center pt-4">
                <form action="/products" method="POST">
                    @csrf

                    <div class="my-6">
                        <label
                            for="name"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        >
                            Product name
                        </label>
                        <input
                            class="border border-gray-400 p-2 w-full"
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
                    
                    <div class="mb-6">
                        <label
                            for="brand"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        >
                            Brand
                        </label>
                        <input
                            class="border border-gray-400 p-2 w-full"
                            type="text"
                            name="brand"
                            id="brand"
                            value="{{ old('brand') }}"
                            required
                        >

                        @error('brand')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-6">
                        <label
                            for="energy"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        >
                            Energy in kcal
                        </label>
                        <input
                            class="border border-gray-400 p-2 w-full"
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
                    
                    <div class="mb-6">
                        <label
                            for="protein"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700" 
                        >
                            Protein in grams
                        </label>
                        <input
                            class="border border-gray-400 p-2 w-full"
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

                    <div class="mb-6">
                        <label
                            for="fat"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        >
                            Fat in grams
                        </label>
                        <input
                            class="border border-gray-400 p-2 w-full"
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
                    
                    <div class="mb-6">
                        <label
                            for="carbs"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        >
                            Carbohydrates in grams
                        </label>
                        <input
                            class="border border-gray-400 p-2 w-full"
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
                    
                    <div class="mb-8">
                        <label
                            for="quantity"
                            class="block mb-2 uppercase font-bold text-xs text-gray-700"
                        >
                            Quantity in grams
                        </label>
                        <input
                            class="border border-gray-400 p-2 w-full"
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

                    <div class="flex justify-end mb-4">
                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold rounded-full uppercase px-5 py-3 focus:outline-none"
                        >
                            Save
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>

@endsection