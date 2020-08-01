<div class="w-1/2 bg-pink-300 rounded-lg p-4 mx-4">
    <div class="text-center text-2xl py-2">
        All Meals
    </div>

    <div class="m-3">
        <div class="flex text-lg mt-8">
            <div class="text-center w-1/6 bg-gray-500 py-3 rounded-tl-lg">
                Name
            </div>
            <div class="text-center w-1/6 bg-gray-400 py-3">
                Energy (cal)
            </div>
            <div class="text-center w-1/6 bg-gray-500 py-3">
                Protein (g)
            </div>
            <div class="text-center w-1/6 bg-gray-400 py-3">
                Fat (g)
            </div>
            <div class="text-center w-1/6 bg-gray-500 py-3">
                Carbs (g)
            </div>
            <div class="text-center w-1/6 bg-gray-400 py-3 rounded-tr-lg"></div>
        </div>

        @forelse ($meals as $meal)
        <div class="flex">
            <div class="text-center w-1/6 bg-gray-500 py-2 {{ $loop->last ? 'rounded-bl-lg' : '' }}">
                <a href="/meals/{{ $meal->id }}">{{ $meal->name }}</a>
            </div>
            <div class="text-center w-1/6 bg-gray-400 py-2">
                {{ $meal->totalValue('energy') }}
            </div>
            <div class="text-center w-1/6 bg-gray-500 py-2">
                {{ $meal->totalValue('protein') }}
            </div>
            <div class="text-center w-1/6 bg-gray-400 py-2">
                {{ $meal->totalValue('fat') }}
            </div>
            <div class="text-center w-1/6 bg-gray-500 py-2">
                {{ $meal->totalValue('carbs') }}
            </div>
            <div class="text-center w-1/6 bg-gray-400 py-2 {{ $loop->last ? 'rounded-br-lg' : '' }}">
                <div class="flex justify-around">
                    <div>
                        <form action="/meals/{{ $meal['id'] }}/edit" method="GET">
                            <button type="submit">
                                <i class="fas fa-edit"></i>
                            </button>
                        </form>
                    </div>
                    <div>
                        <form action="/meals/{{ $meal['id'] }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this meal?');">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @forelse ($meal->products as $product)
        <div class="flex">
            <div class="text-center w-1/6 bg-gray-300 py-2">
                {{ $product->name }}
            </div>
            <div class="text-center w-1/6 bg-gray-200 py-2">
                {{ $product->energy }}
            </div>
            <div class="text-center w-1/6 bg-gray-300 py-2">
                {{ $product->protein }}
            </div>
            <div class="text-center w-1/6 bg-gray-200 py-2">
                {{ $product->fat }}
            </div>
            <div class="text-center w-1/6 bg-gray-300 py-2">
                {{ $product->carbs }}
            </div>
        </div>
        @empty
        <div class="flex">
            <div class="text-center w-full bg-gray-200 p-3">
                This meal doesn't contain any products yet!.
            </div>
        </div>
        @endforelse
        @empty
        <div class="w-full text-center p-3">
            No meals logged so far.
        </div>
        @endforelse

    </div>
</div>