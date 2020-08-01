<div class="w-2/6 bg-orange-300 p-4 m-4">

    <div class="text-center text-2xl pb-5">
        Intake Overview
    </div>

    <div>
        <div class="mx-auto">
            <pie-chart :total-intake="{{ json_encode($totalIntake) }}"></pie-chart>
        </div>
    </div>

    <div>
        Bar graph goes here
    </div>

    <div class="flex justify-between">
        <div class="w-1/2 m-6">
            <table class="table-fixed">
                <thead>
                    <tr>
                        <th colspan="2">Total Intake</th>
                    </tr>
                </thead>
                <tbody class="table-fixed border border-gray-700">
                    <tr class="bg-gray-400">
                        <td class="w-3/4 p-3">Energy</td>
                        <td class="p-3">
                            {{ $totalIntake->energy }}
                        </td>
                    </tr>
                    <tr class="bg-gray-500">
                        <td class="p-3">Protein</td>
                        <td class="p-3">
                            {{ $totalIntake->protein }}
                        </td>
                    </tr>
                    <tr class="bg-gray-400">
                        <td class="p-3">Fat</td>
                        <td class="p-3">
                            {{ $totalIntake->fat }}
                        </td>
                    </tr>
                    <tr class="bg-gray-500">
                        <td class="p-3">Carbs</td>
                        <td class="p-3">
                            {{ $totalIntake->carbs }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="w-1/2 m-6">
            <table class="table-fixed">
                <thead>
                    <tr>
                        <th colspan="2">Required Intake</th>
                    </tr>
                </thead>
                <tbody class="table-fixed border border-gray-700">
                    <tr class="bg-gray-400">
                        <td class=" w-3/4 p-3">Energy</td>
                        <td class="p-3">value1</td>
                    </tr>
                    <tr class="bg-gray-500">
                        <td class="p-3">Protein</td>
                        <td class="p-3">value2</td>
                    </tr>
                    <tr class="bg-gray-400">
                        <td class="p-3">Fat</td>
                        <td class="p-3">value3</td>
                    </tr>
                    <tr class="bg-gray-500">
                        <td class="p-3">Carbs</td>
                        <td class="p-3">value4</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>