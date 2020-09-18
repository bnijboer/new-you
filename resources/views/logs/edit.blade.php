@extends('layouts.app')

@section('title', 'Edit Log')

@section('banner-text', 'Edit Log')

@section('content')

    <div class="flex justify-center">
        <div class="lg:w-1/3">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="bg-indigo-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
                    Adjust Quantity
                </div>
                <div class="py-6">
                    <form action="/logs/{{ $log->id }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="flex py-4 px-6 text-left">
                            <div class="w-1/2 text-gray-700 text-xl pr-4">
                        
                                {{ $log->product->name }}
                                            
                                @isset($log->product->brand)
                                    ({{ $log->product->brand }})
                                @endisset
                        
                            </div>
                            <div class="w-1/2 text-gray-600 text-sm">
                                <div class="flex">
                                    <div class="w-1/2">
                                        Energy: 
                                    </div>
                                    <div class="w-1/4">
                                        <input
                                            class="w-full text-right focus:outline-none"
                                            type="number"
                                            id="energy"
                                            name="energy"
                                            value="{{ $log->energy }}"
                                            readonly
                                        >
                                    </div>
                                    <div class="w-1/4 pl-1">
                                        kcal
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="w-1/2">
                                        Protein: 
                                    </div>
                                    <div class="w-1/4">
                                        <input
                                            class="w-full text-right focus:outline-none"
                                            type="number"
                                            id="protein" 
                                            name="protein"
                                            value="{{ $log->protein }}"
                                            readonly
                                        >
                                    </div>
                                    <div class="w-1/4 pl-1">
                                        g
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="w-1/2">
                                        Fat: 
                                    </div>
                                    <div class="w-1/4">
                                        <input
                                            class="w-full text-right focus:outline-none"
                                            type="number"
                                            id="fat"
                                            name="fat"
                                            value="{{ $log->fat }}"
                                            readonly
                                        >
                                    </div>
                                    <div class="w-1/4 pl-1">
                                        g
                                    </div>
                                </div>
                                <div class="flex">
                                    <div class="w-1/2">
                                        Carbs: 
                                    </div>
                                    <div class="w-1/4">
                                        <input
                                            class="w-full text-right focus:outline-none"
                                            type="number"
                                            id="carbs"
                                            name="carbs"
                                            value="{{ $log->carbs }}"
                                            readonly
                                        >
                                    </div>
                                    <div class="w-1/4 pl-1">
                                        g
                                    </div>
                                </div>
                            </div>
                        </div>

                    
                        <div class="my-6 text-center">
                            <label
                                for="quantity"
                                class="block mb-2 uppercase font-bold text-xs text-gray-700"
                            >
                                Quantity
                            </label>

                            <input
                                class="border border-gray-400 p-2 w-20"
                                type="number"
                                id="quantity"
                                name="quantity"
                                value="{{ $log->quantity }}"
                                required
                            >
                            @error('quantity')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-center mt-10 pb-6">
                            <button
                                type="submit"
                                class="w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-full uppercase px-5 py-3 focus:outline-none"
                            >
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('scripts')
    <script src="{{ asset('js/ratio-calculator.js') }}"></script>
@endpush