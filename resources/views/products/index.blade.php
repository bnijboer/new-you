@extends('layouts.app')

@section('title', 'Products')

@section('banner-text', 'Select Product')

@section('content')

    <div class="lg:flex lg:justify-around">
        <div class="lg:w-5/12 mb-6">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="bg-indigo-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
                    Search Products
                </div>
                
                <div class="flex justify-center">
                    <form action="{{ route('products') }}" method="GET" role="search">
                        <div class="flex justify-between text-center my-8 rounded-full border border-gray-200 overflow-hidden">
                            <div>
                                <input
                                    class="pl-2 py-2 ml-4 mr-2 my-2"
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
                                                <div class="w-1/2 text-gray-700 lg:text-xl pr-4">
                                                
                                                    {{ $result->name }}
                                                    
                                                    @isset($result->brand)
                                                        ({{ $result->brand }})
                                                    @endisset
                                                    
                                                </div>
                                                <div class="w-1/2 text-gray-600 text-xs lg:text-sm">
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
                                                            Carbs: 
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
        
        <div class="lg:w-1/2">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="bg-indigo-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
                    All products
                </div>
                
                @if (! $products->isEmpty())
                    <div class="py-6">
                        @foreach($products as $product)
                            <div class="flex">
                                <div class="w-11/12">
                                    <form action="/logs/create" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product['id'] }}">
                                        <button
                                            type="submit"
                                            class="w-full hover:bg-green-300 focus:bg-green-300"
                                        >
                                            <div class="flex py-4 px-6 text-left">
                                                <div class="w-1/2 text-gray-700 lg:text-xl pr-4">
                                                
                                                    {{ $product->name }}
                                                    
                                                    @isset($product->brand)
                                                        ({{ $product->brand }})
                                                    @endisset
                                                    
                                                </div>
                                                <div class="w-1/2 text-gray-600 text-xs lg:text-sm">
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
                                                            Carbs: 
                                                        </div>
                                                        <div class="w-1/2">
                                                            {{ $product->carbs }} g
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </form>
                                </div>
                                <div class="lg:flex w-1/12 mx-4">
                                    <div class="my-2">
                                        <a
                                            class="text-gray-600 hover:text-orange-400 focus:text-orange-400"
                                            href="/products/{{ $product['id'] }}/edit"
                                        >
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </div>
                                    <div class="my-2 lg:mx-3">
                                        <form action="/products/{{ $product['id'] }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button
                                                type="submit"
                                                onclick="return confirm('Are you sure you want to delete this product?');"
                                                class="text-gray-600 hover:text-red-500 focus:text-red-500"
                                            >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-6 text-center">
                        You haven't stored any products yet!
                        
                        <a
                            href="/products/create"
                            class="w-48 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full uppercase px-5 py-3 mt-8 mx-auto block"
                        >
                            Create Product
                        </a>
                    </div>
                @endif
                
            </div>
        </div>
    </div>

@endsection