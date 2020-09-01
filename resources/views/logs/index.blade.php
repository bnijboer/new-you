@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div>
        
        <div class="bg-indigo-200 rounded-lg p-4 m-4">
            <div class="text-center">
                <div class="py-2">
                    <div class="text-3xl font-semibold">
                        Intake Overview
                    </div>
                    </p>
                    <div class="text-2xl flex justify-center my-3">
                        <div>
                            <form action="/dates" method="POST">
                                @csrf
                                <button type="submit" name="previous" value="{{ $shownDate->toDateString() }}">
                                    <i class="fas fa-angle-left"></i>
                                </button>
                            </form>
                        </div>
                        <div class="mx-6">
                            {{ $shownDate->isoFormat('dddd, MMMM D, YYYY') }}
                        </div>
                        <div>
                            @if (! $shownDate->isSameDay(currentDate()) )
                                <form action="/dates" method="POST">
                                    @csrf
                                    <button type="submit" name="next" value="{{ $shownDate->toDateString() }}">
                                        <i class="fas fa-angle-right"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                        
                </div>
                <div class="my-4">
                    <label for="date-picker" class="block mb-2 uppercase font-bold text-xs text-gray-700">Previous Logs:</label>
                    <form action="/dates" method="POST">
                        @csrf
                        <input
                            class="p-1 text-center border border-gray-300 rounded-lg"
                            type="date"
                            id="date-picker"
                            name="date"
                            value="{{ $shownDate->toDateString() }}"
                            max="{{ currentDate()->toDateString() }}"
                        >
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg" type="submit">View</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="flex">
        
            <div class="w-1/2 bg-pink-300 mx-4">
                <div class="bg-white">
                    <table class="w-full">
                        <thead>
                            <div class="bg-blue-400 text-center text-2xl font-bold text-white uppercase py-2">
                                Logs
                            </div>
                        </thead>
                        <tbody>
                            @forelse ($logs as $log)
                                <tr class="text-xl font-semibold text-gray-700">
                                    <td class="w-1/6 text-center bg-blue-100 py-2">
                                        {{ $log->created_at->isoFormat('HH:mm') }}
                                    </td>
                                    <td class="w-2/3 text-center bg-blue-200 py-2">
                                        {{ $log->product->name }}
                                        
                                        @isset($log->product->brand)
                                            ({{ $log->product->brand }})
                                        @endisset
                                    </td>
                                    <td class="w-1/6 text-center text-white bg-blue-300 py-2">
                                        <button class="toggler focus:outline-none">
                                            <i class="fas fa-info"></i>
                                        </button>
                                    </td>
                                </tr>
                                
                                <div>
                                    <tr class="target hidden text-xl font-semibold text-gray-700">
                                        <td class="w-1/6 text-center bg-blue-100 py-2"></td>
                                        <td class="w-2/3 bg-blue-200 py-2 px-4">
                                            <table class="w-full text-sm text-gray-600">
                                                <tr>
                                                    <td class="w-1/2">
                                                        Energy:
                                                    </td>
                                                    <td class="w-1/2">
                                                        {{ $log->energy }} kcal
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-1/2">
                                                        Protein:
                                                    </td>
                                                    <td class="w-1/2">
                                                        {{ $log->protein }} g
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-1/2">
                                                        Fat:
                                                    </td>
                                                    <td class="w-1/2">
                                                        {{ $log->fat }} g
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="w-1/2">
                                                        Carbohydrates:
                                                    </td>
                                                    <td class="w-1/2">
                                                        {{ $log->carbs }} g
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td class="w-1/6 text-center text-white bg-blue-300 py-2"></td>
                                    </tr>
                                </div>
                            @empty
                                <tr class="flex justify-center">
                                    <td>
                                    No logs so far.
                                        
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        
                    </table>
                </div>
            </div>
            
            <div class="w-1/2 bg-orange-300 rounded-lg p-4 mx-4">

                <div class="text-center text-2xl font-semibold py-2">
                    Total Intake
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
                            <tbody class="border border-gray-700">
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
                            <tbody class="border border-gray-700">
                                <tr class="bg-gray-400">
                                    <td class=" w-3/4 p-3">Energy</td>
                                    <td class="p-3">{{ $requiredIntake->energy - $totalIntake->energy }}</td>
                                </tr>
                                <tr class="bg-gray-500">
                                    <td class="p-3">Protein</td>
                                    <td class="p-3">{{ $requiredIntake->protein - $totalIntake->protein  }}</td>
                                </tr>
                                <tr class="bg-gray-400">
                                    <td class="p-3">Fat</td>
                                    <td class="p-3">{{ $requiredIntake->fat - $totalIntake->fat }}</td>
                                </tr>
                                <tr class="bg-gray-500">
                                    <td class="p-3">Carbs</td>
                                    <td class="p-3">{{ $requiredIntake->carbs - $totalIntake->carbs }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
        
        
        
        
    </div>
    
    

@endsection

@push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endpush