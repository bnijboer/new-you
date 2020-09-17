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
                                    class="w-full hover:bg-green-300"
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
                                <form action="/products/{{ $product['id'] }}/edit" method="GET">
                                    <button
                                        type="submit"
                                        class="text-gray-600 hover:text-orange-400"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="my-2 lg:mx-3">
                                <form action="/products/{{ $product['id'] }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button
                                        type="submit"
                                        onclick="return confirm('Are you sure you want to delete this product?');"
                                        class="text-gray-600 hover:text-red-500"
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
                There aren't any products in the database yet.
            </div>
        @endif
        
    </div>
</div>