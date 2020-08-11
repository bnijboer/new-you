@extends('components.app')

@section('title', 'Search Products')

@section('content')

    <div>
        <form action="/search" method="POST" role="search">
            @csrf
            <div>
                <input type="text" name="product_name" placeholder="Search products">
                <button type="submit">
                    Search
                </button>
            </div>
        </form>
    </div>

@endsection