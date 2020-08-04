<div class="w-1/2 bg-pink-300 rounded-lg p-4 mx-4">
    <div class="text-center text-2xl py-2">
        All Meals
    </div>

    <div class="text-center m-3">
        <div class="flex text-lg font-bold  mt-8">
            <div class="w-1/5 bg-gray-500 py-3 rounded-tl-lg">
                Name
            </div>
            <div class="w-1/5 bg-gray-400 py-3">
                Energy (cal)
            </div>
            <div class="w-1/5 bg-gray-500 py-3">
                Protein (g)
            </div>
            <div class="w-1/5 bg-gray-400 py-3">
                Fat (g)
            </div>
            <div class="w-1/5 bg-gray-500 py-3 rounded-tr-lg">
                Carbs (g)
            </div>
        </div>

        @forelse ($meals as $meal)
        <div class="flex">
            <div class="w-1/5 bg-gray-500 py-2">
                <a href="/meals/{{ $meal->id }}">{{ $meal->name }}</a>
            </div>
            <div class="w-1/5 bg-gray-400 py-2">
                {{ $meal->totalValue('energy') }}
            </div>
            <div class="w-1/5 bg-gray-500 py-2">
                {{ $meal->totalValue('protein') }}
            </div>
            <div class="w-1/5 bg-gray-400 py-2">
                {{ $meal->totalValue('fat') }}
            </div>
            <div class="w-1/5 bg-gray-500 py-2">
                {{ $meal->totalValue('carbs') }}
            </div>
        </div>
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
                This meal doesn't contain any products yet!.
            </div>
        </div>
        @endforelse
        @empty
        <div class="w-full p-3">
            No meals logged so far.
        </div>
        @endforelse
    </div>
</div>