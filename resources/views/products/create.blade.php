@extends('layouts.app')

@section('title', 'Create New Product')

@section('content')

    <div class="flex">

        <div class="bg-pink-300 rounded-lg w-1/3 p-4 mx-auto">
            <div class="text-center text-2xl py-2">
                Add Product To Database
            </div>

            <div class="flex justify-center mt-8">
                <form action="/products" method="POST">
                    @csrf

                    <div>
                        <div>
                            <input class="p-2 border border-gray-300 rounded-lg" type="text" name="name" id="name" placeholder="Product name" value="{{ old('name') }}">
                        </div>

                        @error('name')
                            <div>
                                <span class="text-red-500 text-sm">
                                    {{ $message }}
                                </span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div>
                            <input class="p-2 border border-gray-300 rounded-lg" type="number" name="energy" id="energy" placeholder="Caloric value" value="{{ old('energy') }}">
                        </div>

                        @error('energy')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div>
                            <input class="p-2 border border-gray-300 rounded-lg" type="number" name="protein" id="protein" placeholder="Protein value" value="{{ old('protein') }}">
                        </div>

                        @error('protein')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div>
                            <input class="p-2 border border-gray-300 rounded-lg" type="number" name="fat" id="fat" placeholder="Fat value" value="{{ old('fat') }}">
                        </div>

                        @error('fat')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="mt-6">
                        <div>
                            <input class="p-2 border border-gray-300 rounded-lg" type="number" name="carbs" id="carbs" placeholder="Carbohydrate value" value="{{ old('carbs') }}">
                        </div>

                        @error('carbs')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mt-6">
                        <div>
                            <input class="p-2 border border-gray-300 rounded-lg" type="number" name="quantity" id="quantity" placeholder="Quantity, ex.: 100" value="{{ old('quantity') }}">
                        </div>

                        @error('quantity')
                            <div>
                                <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                            </div>
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