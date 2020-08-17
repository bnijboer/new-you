@extends('layouts.app')

@section('title', 'Create New Log')

@section('content')

    <div class="bg-blue-300 rounded-lg w-full p-4 mx-auto">
        <div class="text-center text-2xl py-2">
            Add Intake Log
        </div>
        
        <!-- <div>
            <form action="/search" method="POST" role="search">
                @csrf
                
                <div>
                    <input type="text" name="product_name" placeholder="Search products">
                    <button type="submit">
                        Search
                    </button>
                </div>
            </form>
        </div> -->

        @isset($product)
            <div class="flex justify-center mt-8">
                <form action="/logs" method="POST">
                    @csrf
                    
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th width="w-1/6">Energy</th>
                                <th width="w-1/6">Protein</th>
                                <th width="w-1/6">Fat</th>
                                <th width="w-1/6">Carbs</th>
                                <th width="w-1/6">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" id="product_id" name="product_id" value="{{ $product->id }}">
                                    <input class="p-2 border border-gray-300 rounded-lg" type="number" id="energy" name="energy" value="{{ $product->energy }}" required>
                                </td>
                                <td>
                                    <input class="p-2 border border-gray-300 rounded-lg" type="number" id="protein" name="protein" value="{{ $product->protein }}" required>
                                </td>
                                <td>
                                    <input class="p-2 border border-gray-300 rounded-lg" type="number" id="fat" name="fat" value="{{ $product->fat }}" required>
                                </td>
                                <td>
                                    <input class="p-2 border border-gray-300 rounded-lg" type="number" id="carbs" name="carbs" value="{{ $product->carbs }}" required>
                                </td>
                                <td>
                                    <input class="p-2 border border-gray-300 rounded-lg" type="number" id="quantity" value="{{ $product->quantity }}" required>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="flex justify-end mt-6 mb-3">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Add</button>
                    </div>

                </form>
            </div>
        @endisset
    </div>
    
@endsection

@push('scripts')
    <script src="{{ asset('js/ratio-calculator.js') }}"></script>
@endpush