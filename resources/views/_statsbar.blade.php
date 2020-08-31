<div class="py-4 m-4">

    @if (currentDiet())
    
        <div class="text-center text-xl font-extrabold py-2">
            Current Diet
        </div>
        <div class="mt-4 text-sm flex justify-center">
            <table class="w-full table-fixed rounded-lg">
                <tbody>
                    <tr class="bg-indigo-200">
                        <td class="w-2/3 p-3 font-bold">
                            Goal
                        </td>
                        <td class="w-1/3 p-3">
                            
                            @if (currentDiet()->starting_weight - currentDiet()->target_weight > 0)
                                Lose 
                            @else
                                Gain 
                            @endif
                            
                            {{ abs(currentDiet()->starting_weight - currentDiet()->target_weight) }} kg
                            
                        </td>
                    </tr>
                    <tr class="bg-indigo-100">
                        <td class="w-2/3 p-3 font-bold">
                            Starting Weight
                        </td>
                        <td class="w-1/3 p-3">
                            {{ currentDiet()->starting_weight }} kg
                        </td>
                    </tr>
                    <tr class="bg-indigo-200">
                        <td class="w-2/3 p-3 font-bold">
                            Current Weight
                        </td>
                        <td class="w-1/3 p-3">
                            {{ currentUser()->current_weight }} kg
                        </td>
                    </tr>
                    <tr class="bg-indigo-100">
                        <td class="w-2/3 p-3 font-bold">
                            Target Weight
                        </td>
                        <td class="w-1/3 p-3">
                            {{ currentDiet()->target_weight }} kg
                        </td>
                    </tr>
                    <tr class="bg-indigo-200">
                        <td class="w-2/3 p-3 font-bold">
                            End Date
                        </td>
                        <td class="w-1/3 p-3">
                            {{ currentDiet()->ends_at->format('D, d M. Y') }}
                        </td>
                    </tr>
                    <tr class="bg-indigo-100">
                        <td class="w-2/3 p-3 font-bold">
                            Total Duration
                        </td>
                        <td class="w-1/3 p-3">
                            {{ currentDiet()->getDuration() }} days
                        </td>
                    </tr>
                    <tr class="bg-indigo-200">
                        <td class="w-2/3 p-3 font-bold">
                            Days Left
                        </td>
                        <td class="w-1/3 p-3">
                            {{ currentDiet()->getDaysLeft() }} days
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
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