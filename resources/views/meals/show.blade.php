<x-master>
    <div>
        <h1>Meal Info</h1>
        
        <h4>{{ $meal->name }}:</h4>
        
        <ul>
            <li>{{ $meal->energy }} kcal</li>
            <li>{{ $meal->protein }}g protein</li>
            <li>{{ $meal->fat }}g fat</li>
            <li>{{ $meal->carbs }}g carbohydrates</li>
            <li>{{ $meal->totalEnergy }} total energy</li>
        </ul>

        <form action="/meals/{{ $meal->id }}/edit" method="GET">
                @csrf
                <button type="submit">Edit</button>
        </form>

        <form action="/meals/{{ $meal->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
    </div>
</x-master>