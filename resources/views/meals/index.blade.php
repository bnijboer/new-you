<x-master>
    <div style="display: flex">
        <div style="border: 1px solid black; width: 50%">

            <div>
                <h1>All meals</h1>

                @foreach ($allMeals as $meal)
                <h4>{{ $meal['name'] }}:</h4>

                <ul>
                    <li>Energy: {{ $meal['energy'] }} kcal</li>
                    <li>Protein: {{ $meal['protein'] }} g</li>
                    <li>Fat: {{ $meal['fat'] }} g</li>
                    <li>Carbohydrate: {{ $meal['carbs'] }} g</li>
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
            </div>

            <div>
                <h1>Add meal</h1>
                <form action="/meals" method="POST">
                    @csrf

                    <input type="text" name="name" placeholder="Product name" value="{{ old('name') }}">
                    @error('name')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                    <input type="number" name="energy" placeholder="Caloric value" value="{{ old('energy') }}">
                    @error('energy')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                    <input type="number" name="protein" placeholder="Protein value" value="{{ old('protein') }}">
                    @error('protein')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                    <input type="number" name="fat" placeholder="Fat value" value="{{ old('fat') }}">
                    @error('fat')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                    <input type="number" name="carbohydrates" placeholder="Carbohydrate value"
                        value="{{ old('carbs') }}">
                    @error('carbohydrates')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                    <button type="submit">Add</button>
                </form>
            </div>

        </div>

        <div style="border: 1px solid black; width: 50%">
            <h3>Total intake:</h3>
            <ul>
                <li>Energy: {{ $totalIntake['energy'] }} kcal</li>
                <li>Protein: {{ $totalIntake['protein'] }} g</li>
                <li>Fat: {{ $totalIntake['fat'] }} g</li>
                <li>Carbohydrate: {{ $totalIntake['carbs'] }} g</li>
            </ul>

            <div style="width: 600px; height: 600px">
                <canvas id="myChart" width="100" height="100"></canvas>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

        <script>
            var totalIntake = <?= json_encode($totalIntake) ?> ;

            var ctx = document.getElementById('myChart').getContext('2d');

            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Protein', 'Fat', 'Carbohydrate'],
                    datasets: [{
                        backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(10, 230, 40)',
                            'rgb(155, 99, 232)'
                        ],
                        data: [
                            totalIntake['protein'],
                            totalIntake['fat'],
                            totalIntake['carbs']
                        ]
                    }]
                },
                options: {}
            });
        </script>
    </div>
</x-master>