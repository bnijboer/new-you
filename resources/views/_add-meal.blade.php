<div class="bg-pink-300 rounded-lg w-1/3 p-4 mx-auto">
    <div class="text-center text-2xl py-2">
        Add Meal To Database
    </div>

    <div class="flex justify-center mt-8">
        <form action="/meals" method="POST">
            @csrf

            <div>
                <div>
                    <input class="p-2 border border-gray-300 rounded-lg" type="text" name="name" id="name" placeholder="Meal name" value="{{ old('name') }}">
                </div>

                @error('name')
                <div>
                    <span class="text-red-500 text-sm">
                        {{ $message }}
                    </span>
                </div>
                @enderror
            </div>

            <div class="flex justify-end mt-6 mb-3">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Add</button>
            </div>

        </form>
    </div>
</div>