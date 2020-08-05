<x-app>
    <div class="flex">
        <div class="w-3/4 bg-pink-300 rounded-lg p-4 mx-auto">
            <div class="text-center text-2xl py-2">
                {{ $meal->name }}
            </div>

            <div class="text-center mx-3">
                <div class="flex text-lg font-bold mt-8">
                    <div class="w-1/5 bg-gray-600 py-3 rounded-tl-lg">
                        Name
                    </div>
                    <div class="w-1/5 bg-gray-600 py-3">
                        Energy (cal)
                    </div>
                    <div class="w-1/5 bg-gray-600 py-3">
                        Protein (g)
                    </div>
                    <div class="w-1/5 bg-gray-600 py-3">
                        Fat (g)
                    </div>
                    <div class="w-1/5 bg-gray-600 py-3 rounded-tr-lg">
                        Carbs (g)
                    </div>
                </div>
            </div>
            <div class="text-center mx-3">
                @forelse ($meal->products as $product)
                <div class="flex">
                    <div class="w-1/5 bg-gray-300 py-2">
                        {{ $product->name }}
                    </div>
                    <div class="w-1/5 bg-gray-200 py-2">
                        {{ $product->energy }}
                    </div>
                    <div class="w-1/5 bg-gray-300 py-2">
                        {{ $product->protein }}
                    </div>
                    <div class="w-1/5 bg-gray-200 py-2">
                        {{ $product->fat }}
                    </div>
                    <div class="w-1/5 bg-gray-300 py-2">
                        {{ $product->carbs }}
                    </div>
                </div>
                @empty
                <div class="flex">
                    <div class="w-full bg-gray-200 p-3">
                        This meal doesn't contain any products yet!
                    </div>
                </div>
                @endforelse
                <div class="flex font-bold text-lg">
                    <div class="w-1/5 bg-gray-500 py-2 rounded-bl-lg">
                        Totals:
                    </div>
                    <div class="w-1/5 bg-gray-500 py-2">
                        {{ $meal->totalValue('energy') }}
                    </div>
                    <div class="w-1/5 bg-gray-500 py-2">
                        {{ $meal->totalValue('protein') }}
                    </div>
                    <div class="w-1/5 bg-gray-500 py-2">
                        {{ $meal->totalValue('fat') }}
                    </div>
                    <div class="w-1/5 bg-gray-500 py-2 rounded-br-lg">
                        {{ $meal->totalValue('carbs') }}
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <div class="flex justify-end">
                    <div class="mr-3">
                        <form action="/meals/{{ $meal->id }}/edit" method="GET">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit">
                                <i class="fas fa-edit"></i>
                            </button>
                        </form>
                    </div>
                    <div class="mr-3">
                        <form action="/meals/{{ $meal->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                type="submit" onclick="return confirm('Are you sure you want to delete this meal?');">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>