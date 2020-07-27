<x-master>
    <div>
        <h1>Edit Meal</h1>

        <form action="/meals/{{ $meal->id }}" method="POST">
            @csrf
            @method('put')

            <h4><input type="text" name="name" value="{{ $meal->name }}">:</h4>
            <input type="number" name="energy" value="{{ $meal->energy }}">kcal
            <input type="number" name="protein" value="{{ $meal->protein }}">g protein
            <input type="number" name="fat" value="{{ $meal->fat }}">g fat
            <input type="number" name="carbs" value="{{ $meal->carbs }}">g carbohydrates
            <button type="submit">Update</button>
        </form>
    </div>
</x-master>