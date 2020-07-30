<x-app>

    <div class="flex">
        <div class="w-1/2 bg-pink-300 p-4 m-4">
            <div class="text-center text-2xl pb-5">
                All Meals
            </div>

            <div class="flex font-bold">
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
                    Carbohydrates (g)
                </div>
                <div class="text-center w-1/6 bg-gray-400 py-3 rounded-tr-lg"></div>
            </div>

            @forelse ($meals as $meal)

            <div class="flex">
                <div class="text-center w-1/6 bg-gray-500 py-2 {{ $loop->last ? 'rounded-bl-lg' : '' }}">
                    {{ $meal->name }}
                </div>
                <div class="text-center w-1/6 bg-gray-400 py-2">
                    {{ totalValue($meal->products, 'energy') }}
                </div>
                <div class="text-center w-1/6 bg-gray-500 py-2">
                    {{ totalValue($meal->products, 'protein') }}
                </div>
                <div class="text-center w-1/6 bg-gray-400 py-2">
                    {{ totalValue($meal->products, 'fat') }}
                </div>
                <div class="text-center w-1/6 bg-gray-500 py-2">
                    {{ totalValue($meal->products, 'carbs') }}
                </div>
                <div class="text-center w-1/6 bg-gray-400 py-2 {{ $loop->last ? 'rounded-br-lg' : '' }}">
                    <div class="flex justify-around">
                        <div>
                            <form action="/meals/{{ $meal['id'] }}/edit" method="GET">
                                <button type="submit">Edit</button>
                            </form>
                        </div>
                        <div>
                            <form action="/meals/{{ $meal['id'] }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="w-full text-center p-3">
                No meals logged so far.
            </div>
            @endforelse

        </div>

        <div class="w-1/2 bg-orange-300">
            kanker
        </div>

    </div>

</x-app>