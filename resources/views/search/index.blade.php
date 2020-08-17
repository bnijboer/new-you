@extends('layouts.app')

@section('title', 'Search Products')

@section('content')

    <div class="flex">

        <div class="bg-yellow-300 rounded-lg w-1/3 p-4 mx-auto">
            <div class="text-center text-2xl py-2">
                Search Products
            </div>

            <div class="flex justify-center mt-8">
                <form action="/results" method="GET" role="search">
                    <div>
                        <input class="p-2 border border-gray-300 rounded-lg" type="text" name="query" placeholder="Enter keyword(s)" required>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                            Search
                        </button>
                    </div>
                </form>
            </div>
            
            @isset($results)
                <div class="flex justify-center mt-8">
                    <div>
                        <ul>
                            @forelse ($results as $result)
                                <form action="/logs/create" method="POST">
                                    @csrf
                                    <li>
                                        <input type="hidden" name="id" value="{{ $result['id'] }}">
                                        <button type="submit">{{ $result->name }}</button>
                                    </li>
                                </form>
                            @empty
                                <li>
                                    No products to display.
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            @endisset
        </div>

    </div>

@endsection