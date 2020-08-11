@extends('components.app')

@section('title', 'Search Results')

@section('content')

    <div>
        <ul>
            @forelse ($products as $product)
                <form action="/logs/create" method="POST">
                    @csrf
                    <li>
                        <input type="hidden" name="id" value="{{ $product['id'] }}">
                        <button type="submit">{{ $product->name }}</button>
                    </li>
                </form>
            @empty
                <li>
                    No products to display.
                </li>
            @endforelse
        </ul>

    </div>

@endsection