@if (currentDiet())
    <div class="justify-center border-2 border-green-400 bg-green-300 rounded-lg p-2">
        <table class="table-fixed">
            <thead>
                <div class="bg-green-300 text-center text-xl font-extrabold text-white uppercase pb-2">
                    Your Diet
                </div>
            </thead>
            <tbody class="text-sm bg-white font-semibold text-gray-700">
                <tr>
                    <td class="w-2/3 p-3 font-bold">
                        Goal
                    </td>
                    <td class="w-1/3 p-3 text-gray-600">
                        
                        {{ (currentDiet()->starting_weight - currentDiet()->target_weight > 0) ? 'Lose' : 'Gain' }}
                        
                        {{ abs(currentDiet()->starting_weight - currentDiet()->target_weight) }} kg
                        
                    </td>
                </tr>
                <tr>
                    <td class="p-3 font-bold">
                        Starting Weight
                    </td>
                    <td class="p-3 text-gray-600">
                        {{ currentDiet()->starting_weight }} kg
                    </td>
                </tr>
                <tr>
                    <td class="p-3 font-bold">
                        Current Weight
                    </td>
                    <td class="p-3 text-gray-600">
                        {{ currentUser()->current_weight }} kg
                    </td>
                </tr>
                <tr>
                    <td class="p-3 font-bold">
                        Target Weight
                    </td>
                    <td class="p-3 text-gray-600">
                        {{ currentDiet()->target_weight }} kg
                    </td>
                </tr>
                <tr>
                    <td class="p-3 font-bold">
                        End Date
                    </td>
                    <td class="p-3 text-gray-600">
                        {{ currentDiet()->ends_at->format('D, d M. Y') }}
                    </td>
                </tr>
                <tr>
                    <td class="p-3 font-bold">
                        Total Duration
                    </td>
                    <td class="p-3 text-gray-600">
                        {{ currentDiet()->duration }} days
                    </td>
                </tr>
                <tr>
                    <td class="p-3 font-bold">
                        Days Left
                    </td>
                    <td class="p-3 text-gray-600">
                        {{ currentDiet()->daysLeft }} days
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@else
    <div class="justify-center text-center border border-green-400 rounded-lg p-2 shadow-lg">
        <div class="bg-green-100 font-semibold rounded-lg py-3">
            You are currently at maintenance.
        </div>
        <div class="pt-6 pb-3">
            <a
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full"
                href="/diets/create"
            >
                Create Diet
            </a>
        </div>
    </div>
@endif

</div>