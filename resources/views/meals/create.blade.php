<x-app>
    <div class="flex">
        <div class="w-1/2 bg-pink-300 rounded-lg p-4 mx-auto">
            <div class="text-center text-2xl py-2">
                Add Meal To Database
            </div>

            <div class="flex justify-center mt-8">
                <form action="/meals" method="POST">
                    @csrf

                    <div class="flex justify-center">
                        <input class="p-2 border border-gray-300 rounded-lg" type="text" name="name" id="name" placeholder="Meal name" value="{{ old('name') }}">
                    </div>

                    @error('name')
                        <div>
                            <span class="text-red-500 text-sm">
                                {{ $message }}
                            </span>
                        </div>
                    @enderror
                    
                    <div class="mt-8">
                        <meal-product-table></meal-product-table>
                    </div>
                    
                    <div class="flex justify-center mt-6 mb-3">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Add</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="w-1/3 bg-yellow-300 rounded-lg p-4 mx-auto">
            <div class="text-center text-2xl py-2">
                All Products
            </div>
            <div>
                <ul>
                    @foreach ($products as $product)
                        <li>
                            <a href="#" n="{{ $product->name }}" energy="{{ $product->energy }}" class="addRow">{{ $product->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    
</x-app>