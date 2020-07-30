<x-app>
    <div>
        <h1>Edit Meal</h1>

        <form action="/meals/{{ $meal->id }}" method="POST">
            @csrf
            @method('put')

            <input type="text" name="name" value="{{ $meal->name }}">
            <button type="submit">Update</button>
        </form>
    </div>
</x-app>