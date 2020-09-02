<div class="justify-center border-2 border-green-400 bg-green-300 rounded-lg mt-4 p-2">

    @if (currentDiet())
        <table class="table-fixed">
            <thead>
                <div class="bg-green-300 text-center text-xl font-extrabold text-white uppercase py-2">
                    Diet
                </div>
            </thead>
            <tbody class="text-sm bg-white font-semibold text-gray-700">
                <tr>
                    <td class="w-32 p-3 font-bold">
                        Goal
                    </td>
                    <td class="p-3">
                        
                        @if (currentDiet()->starting_weight - currentDiet()->target_weight > 0)
                            Lose 
                        @else
                            Gain 
                        @endif
                        
                        {{ abs(currentDiet()->starting_weight - currentDiet()->target_weight) }} kg
                        
                    </td>
                </tr>
                <tr>
                    <td class="w-2/3 p-3 font-bold">
                        Starting Weight
                    </td>
                    <td class="w-1/3 p-3">
                        {{ currentDiet()->starting_weight }} kg
                    </td>
                </tr>
                <tr>
                    <td class="w-2/3 p-3 font-bold">
                        Current Weight
                    </td>
                    <td class="w-1/3 p-3">
                        {{ currentUser()->current_weight }} kg
                    </td>
                </tr>
                <tr>
                    <td class="w-2/3 p-3 font-bold">
                        Target Weight
                    </td>
                    <td class="w-1/3 p-3">
                        {{ currentDiet()->target_weight }} kg
                    </td>
                </tr>
                <tr>
                    <td class="w-2/3 p-3 font-bold">
                        End Date
                    </td>
                    <td class="w-1/3 p-3">
                        {{ currentDiet()->ends_at->format('D, d M. Y') }}
                    </td>
                </tr>
                <tr>
                    <td class="w-2/3 p-3 font-bold">
                        Total Duration
                    </td>
                    <td class="w-1/3 p-3">
                        {{ currentDiet()->duration }} days
                    </td>
                </tr>
                <tr>
                    <td class="w-2/3 p-3 font-bold">
                        Days Left
                    </td>
                    <td class="w-1/3 p-3">
                        {{ currentDiet()->daysLeft }} days
                    </td>
                </tr>
            </tbody>
        </table>
    @else
        <div class="text-center text-md font-semibold pt-2 pb-4">
            You are currently at maintenance.
        </div>
        <div class="m-4 text-center">
            <a
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg"
                href="/diets/create"
            >
                Start Diet
            </a>
        </div>
    @endif

</div>