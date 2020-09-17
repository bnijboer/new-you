@extends('layouts.app')

@section('title', 'Select Product')

@section('banner-text', 'Select Product')

@section('content')

    <div class="lg:flex lg:justify-around">
        <div class="lg:w-5/12 mb-6">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="bg-indigo-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
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
        
        @include('_all-products')
        
    </div>

@endsection