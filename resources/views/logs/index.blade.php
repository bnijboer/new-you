@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="flex">
        <div class="w-1/2 bg-pink-300 rounded-lg p-4 mx-4">
            
            <div class="text-center text-2xl py-2">
                Intake of:
            </div>
            
            <div class="flex justify-center text-center text-2xl py-2">
                {{ $shownDate }}
            </div>

            <div class="text-center m-3">
                <div class="flex text-lg font-bold  mt-8">
                    <div class="w-1/6 bg-gray-400 py-3 rounded-tl-lg">
                        Name
                    </div>
                    <div class="w-1/6 bg-gray-500 py-3">
                        Brand
                    </div>
                    <div class="w-1/6 bg-gray-400 py-3">
                        Energy (cal)
                    </div>
                    <div class="w-1/6 bg-gray-500 py-3">
                        Protein (g)
                    </div>
                    <div class="w-1/6 bg-gray-400 py-3">
                        Fat (g)
                    </div>
                    <div class="w-1/6 bg-gray-500 py-3 rounded-tr-lg">
                        Carbs (g)
                    </div>
                </div>

                @forelse ($logs as $log)
                    <div class="flex">
                        <div class="w-1/5 bg-gray-400 py-2">
                            {{ $log->product->name }}
                        </div>
                        <div class="w-1/5 bg-gray-500 py-2">
                            {{ $log->product->brand }}
                        </div>
                        <div class="w-1/5 bg-gray-400 py-2">
                            {{ $log->energy }}
                        </div>
                        <div class="w-1/5 bg-gray-500 py-2">
                            {{ $log->protein }}
                        </div>
                        <div class="w-1/5 bg-gray-400 py-2">
                            {{ $log->fat }}
                        </div>
                        <div class="w-1/5 bg-gray-500 py-2">
                            {{ $log->carbs }}
                        </div>
                    </div>
                @empty
                    <div class="w-full p-3">
                        No logs so far.
                    </div>
                @endforelse
            </div>
        </div>
        
        <div class="w-1/2 bg-orange-300 rounded-lg p-4 mx-4">

            <div class="text-center text-2xl py-2">
                Intake Overview
            </div>

            <div class="mt-8">
                <div class="mx-auto">
                    @if (! $logs->isEmpty())
                        <pie-chart :total-intake=@json($totalIntake)></pie-chart>
                    @endif
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
        
    </div>

@endsection

@push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endpush