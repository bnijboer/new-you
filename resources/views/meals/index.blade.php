<x-master>
    <div>
        <h1>All meals</h1>
        
        @foreach ($allMeals as $meal)
            <h4>{{ $meal['name'] }}:</h4>

            <ul>
                <li>Energy: {{ $meal['energy'] }} kcal</li>
                <li>Protein: {{ $meal['protein'] }} g</li>
                <li>Fat: {{ $meal['fat'] }} g</li>
                <li>Carbs: {{ $meal['carbs'] }} g</li>
            </ul>

            <form action="/meals/{{ $meal['id'] }}/edit" method="GET">
                @csrf
                <button type="submit">Edit</button>
            </form>

            <form action="/meals/{{ $meal['id'] }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
            </form>

            <br>
        @endforeach

        <h3>Total intake:</h3>
        <ul>
            <li>Energy: {{ $totalIntake['energy'] }} kcal</li>
            <li>Protein: {{ $totalIntake['protein'] }} g</li>
            <li>Fat: {{ $totalIntake['fat'] }} g</li>
            <li>Carbs: {{ $totalIntake['carbs'] }} g</li>
        </ul>
        
        
        
        

    </div>

    <div>
        <h1>Add meal</h1>
        <form action="/meals" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter name">
            <input type="number" name="energy" placeholder="Enter energy">
            <input type="number" name="protein" placeholder="Enter protein">
            <input type="number" name="fat" placeholder="Enter fat">
            <input type="number" name="carbs" placeholder="Enter carbohydrates">
            <button type="submit">Add</button>
        </form>
    </div>
</x-master>