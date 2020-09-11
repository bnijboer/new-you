@extends('layouts.app')

@section('title', 'Select Product')

@section('banner-text', 'Select Product')

@section('content')

    <div class="flex justify-around">
        <div class="w-1/3 mr-4">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="bg-indigo-400 text-center text-2xl text-white font-bold uppercase py-2 rounded-t-lg">
                    Search Products
                </div>
                
                <div class="flex justify-center">
                    <form action="/search" method="GET" role="search">
                        <div class="flex justify-between text-center my-8 rounded-full border border-gray-200 overflow-hidden">
                            <div>
                                <input
                                    class="pl-2 py-2 ml-4 mr-2 my-2 focus:bg-white"
                                    type="text"
                                    name="query"
                                    placeholder="Enter keyword(s)"
                                    @isset($_GET['query'])
                                        value = "{{ $_GET['query'] }}"
                                    @endisset
                                    required
                                >
                            </div>
                            <div class="bg-blue-300 hover:bg-blue-400">
                                <button
                                    type="submit"
                                    class="text-white pt-4 pl-3 pr-5 focus:outline-none"
                                >
                                        <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
            
                @isset($results)
                    <div class="text-center">
                        <div class="font-semibold text-gray-700">
                            Search results for '{{ $_GET['query'] }}':
                        </div>
                        <div class="py-6 text-gray-700 hover:text-gray-900">
                            @forelse ($results as $result)
                                <form action="/logs/create" method="POST">
                                    @csrf
                                    <div>
                                        <input type="hidden" name="id" value="{{ $result['id'] }}">
                                        <button
                                            type="submit"
                                            class="w-full hover:bg-green-300"
                                        >
                                            <div class="flex py-4 px-6 text-left">
                                                <div class="w-1/2 text-gray-700 text-xl">
                                                    {{ $result->name }}
                                                    @isset($result->brand)
                                                        ({{ $result->brand }})
                                                    @endisset
                                                </div>
                                                <div class="w-1/2 text-gray-600 text-sm">
                                                    <div class="flex">
                                                        <div class="w-1/2">
                                                            Energy: 
                                                        </div>
                                                        <div class="w-1/2">
                                                            {{ $result->energy }} kcal
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        <div class="w-1/2">
                                                            Protein: 
                                                        </div>
                                                        <div class="w-1/2">
                                                            {{ $result->protein }} g
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        <div class="w-1/2">
                                                            Fat: 
                                                        </div>
                                                        <div class="w-1/2">
                                                            {{ $result->fat }} g
                                                        </div>
                                                    </div>
                                                    <div class="flex">
                                                        <div class="w-1/2">
                                                            Carbohydrates: 
                                                        </div>
                                                        <div class="w-1/2">
                                                            {{ $result->carbs }} g
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </div>
                                </form>
                            @empty
                                <div>
                                    No products found.
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endisset
            </div>
        </div>
        
        <div class="w-1/3">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="bg-indigo-400 text-center text-2xl text-white font-bold uppercase py-2 rounded-t-lg">
                    All Products
                </div>
                
                @if (! $products->isEmpty())
                    <div class="py-6">
                        @foreach($products as $product)
                            <form action="/logs/create" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product['id'] }}">
                                <button
                                    type="submit"
                                    class="w-full hover:bg-green-300"
                                >
                                    <div class="flex py-4 px-6 text-left">
                                        <div class="w-1/2 text-gray-700 text-xl">
                                            {{ $product->name }}
                                            @isset($product->brand)
                                                ({{ $product->brand }})
                                            @endisset
                                        </div>
                                        <div class="w-1/2 text-gray-600 text-sm">
                                            <div class="flex">
                                                <div class="w-1/2">
                                                    Energy: 
                                                </div>
                                                <div class="w-1/2">
                                                    {{ $product->energy }} kcal
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="w-1/2">
                                                    Protein: 
                                                </div>
                                                <div class="w-1/2">
                                                    {{ $product->protein }} g
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="w-1/2">
                                                    Fat: 
                                                </div>
                                                <div class="w-1/2">
                                                    {{ $product->fat }} g
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="w-1/2">
                                                    Carbohydrates: 
                                                </div>
                                                <div class="w-1/2">
                                                    {{ $product->carbs }} g
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        @endforeach
                    </div>
                @endif
                
            </div>
        </div>
    </div>

@endsection