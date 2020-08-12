@extends('layouts.app')

@section('title', 'All Products')

@section('content')

    <div class="flex">

        <div class="w-5/6 bg-pink-300 rounded-lg p-4 mx-auto">
            <div class="text-center text-2xl py-2">
                All Products
            </div>

            <div class="m-3">
                <div class="flex font-bold mt-8">
                    <div class="text-center w-1/6 bg-gray-400 py-3 rounded-tl-lg">
                        Name
                    </div>
                    <div class="text-center w-1/6 bg-gray-500 py-3">
                        Brand
                    </div>
                    <div class="text-center w-1/6 bg-gray-400 py-3">
                        Energy (cal)
                    </div>
                    <div class="text-center w-1/6 bg-gray-500 py-3">
                        Protein (g)
                    </div>
                    <div class="text-center w-1/6 bg-gray-400 py-3">
                        Fat (g)
                    </div>
                    <div class="text-center w-1/6 bg-gray-500 py-3">
                        Carbohydrates (g)
                    </div>
                    <div class="text-center w-1/6 bg-gray-400 py-3 rounded-tr-lg"></div>
                </div>

                @forelse ($products as $product)
                    <div class="flex">
                        <div class="text-center w-1/6 bg-gray-400 py-2 {{ $loop->last ? 'rounded-bl-lg' : '' }}">
                            <form action="/logs/create" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product['id'] }}">
                                <button class="btn-submit" type="submit">
                                    {{ $product->name }}
                                </button>
                            </form>
                        
                        </div>
                        <div class="text-center w-1/6 bg-gray-500 py-2">
                            {{ $product->brand }}
                        </div>
                        <div class="text-center w-1/6 bg-gray-400 py-2">
                            {{ $product->energy }}
                        </div>
                        <div class="text-center w-1/6 bg-gray-500 py-2">
                            {{ $product->protein }}
                        </div>
                        <div class="text-center w-1/6 bg-gray-400 py-2">
                            {{ $product->fat }}
                        </div>
                        <div class="text-center w-1/6 bg-gray-500 py-2">
                            {{ $product->carbs }}
                        </div>
                        <div class="text-center w-1/6 bg-gray-400 py-2 {{ $loop->last ? 'rounded-br-lg' : '' }}">
                            <div class="flex justify-around">
                                <div>
                                    <form action="/products/{{ $product['id'] }}/edit" method="GET">
                                        <button type="submit"><i class="fas fa-edit"></i></button>
                                    </form>
                                </div>
                                <div>
                                    <form action="/products/{{ $product['id'] }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this product?');">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="w-full text-center p-3">
                        There aren't any products in the database yet.
                    </div>
                @endforelse
            </div>
        </div>

    </div>

@endsection