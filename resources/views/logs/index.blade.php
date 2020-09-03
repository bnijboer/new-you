@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')


    <!-- DATE/TIME SELECT HEADER -->
    
    <div class="bg-indigo-200 text-center rounded-lg py-4 mb-4">
        <div class="text-3xl text-gray-800 font-semibold uppercase">
            Nutritional Intake
        </div>
        <div class="flex justify-center text-2xl text-gray-700 my-3">
            <form action="/dates" method="POST">
                @csrf
                <button class="focus:outline-none" type="submit" name="previous" value="{{ $shownDate->toDateString() }}">
                    <i class="fas fa-angle-left"></i>
                </button>
            </form>
            <div class="mx-6">
                {{ $shownDate->isoFormat('dddd, MMMM D, YYYY') }}
            </div>
            <div>
                @if (! $shownDate->isSameDay(currentDate()) )
                    <form action="/dates" method="POST">
                        @csrf
                        <button class="focus:outline-none" type="submit" name="next" value="{{ $shownDate->toDateString() }}">
                            <i class="fas fa-angle-right"></i>
                        </button>
                    </form>
                @endif
            </div>
        </div>
        <div class="pt-4 pb-2">
            <label for="date-picker" class="block mb-2 uppercase font-bold text-xs text-gray-600">Previous Logs:</label>
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
    
    
    <!-- LOG OVERVIEW -->
    
    <div class="flex">
        <div class="w-1/2 mr-4">
            <div class="bg-white border border-blue-500">
                <table class="w-full">
                    <thead>
                        <div class="bg-blue-400 text-center text-2xl text-white font-bold uppercase py-2">
                            Logs
                        </div>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                            <tr class="w-full text-xl text-center font-semibold text-gray-700">
                                <td class="w-1/6 bg-blue-100 py-4">
                                    {{ $log->created_at->isoFormat('HH:mm') }}
                                </td>
                                <td class="w-2/3 bg-blue-200 py-4">
                                    {{ $log->product->name }}
                                    
                                    @isset($log->product->brand)
                                        ({{ $log->product->brand }})
                                    @endisset
                                </td>
                                <td class="w-1/6 bg-blue-300 text-white py-4">
                                    <button class="log-info focus:outline-none">
                                        <i class="fas fa-info"></i>
                                    </button>
                                </td>
                            </tr>
                                <tr class="target hidden">
                                    <td class="w-1/6 bg-blue-100 pb-2"></td>
                                    <td class="w-2/3 bg-blue-200 pb-2 px-4">
                                        <table class="w-full font-semibold text-sm text-gray-600">
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
                                                </td class="w-1/2">
                                                <td>
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
                                        <hr class="mt-4">
                                    </td>
                                    <td class="w-1/6 bg-blue-300 pb-2"></td>
                                </tr>
                        @empty
                            <tr class="flex justify-center">
                                <td class="py-4">
                                    No logs so far.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
        
        
        <!-- RATIO CHARTS AND TOTAL/REQUIRED INTAKE TABLES -->
        
        <div class="w-1/2 bg-gray-100 border-2 border-blue-100 shadow-lg rounded-lg p-4">
            <div class="flex justify-around mx-auto">
                @if (! $logs->isEmpty())
                    <div class="w-1/2">
                        <div class="text-center text-2xl font-semibold py-4">
                            Current Ratio
                        </div>
                        <div>
                            <total-pie-chart :total-intake=@json($totalIntake)></total-pie-chart>
                        </div>
                    </div>
                @endif
                
                <div class="w-1/2">
                    <div class="text-center text-2xl font-semibold py-4">
                        Optimal Ratio
                    </div>
                    <div>
                        <required-pie-chart :required-intake=@json($requiredIntake)></required-pie-chart>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-around mt-5">
                <div class="w-1/3 m-6">
                    <table class="w-full table-fixed border border-indigo-200 shadow-sm">
                        <thead>
                            <div class="bg-indigo-400 text-center text-xl font-bold text-white uppercase py-2">
                                Total Intake
                            </div>
                        </thead>
                        
                        <tbody class="bg-indigo-100 text-sm font-semibold text-gray-700">
                            <tr>
                                <td class="w-39 p-3">Energy</td>
                                <td class="p-3 text-gray-600">
                                    {{ $totalIntake->energy }} kcal
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3">Protein</td>
                                <td class="p-3 text-gray-600">
                                    {{ $totalIntake->protein }} g
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3">Fat</td>
                                <td class="p-3 text-gray-600">
                                    {{ $totalIntake->fat }} g
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3">Carbohydrates</td>
                                <td class="p-3 text-gray-600">
                                    {{ $totalIntake->carbs }} g
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-1/3 m-6">
                    <table class="w-full table-fixed border border-indigo-200 shadow-sm">
                        <thead>
                            <div class="bg-indigo-400 text-center text-xl font-bold text-white uppercase py-2">
                                Required Intake
                            </div>
                        </thead>
                        <tbody class="bg-indigo-100 text-sm font-semibold text-gray-700">
                            <tr>
                                <td class="w-39 p-3">Energy</td>
                                <td class="p-3 text-gray-600">
                                    {{ $requiredIntake->energy - $totalIntake->energy }} kcal
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3">Protein</td>
                                <td class="p-3 text-gray-600">
                                    {{ $requiredIntake->protein - $totalIntake->protein }} g
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3">Fat</td>
                                <td class="p-3 text-gray-600">
                                    {{ $requiredIntake->fat - $totalIntake->fat }} g
                                </td>
                            </tr>
                            <tr>
                                <td class="p-3">Carbohydrates</td>
                                <td class="p-3 text-gray-600">
                                    {{ $requiredIntake->carbs - $totalIntake->carbs }} g
                                </td>
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