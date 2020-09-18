@extends('layouts.app')

@section('title', 'Dashboard')

@section('banner-text', 'Dashboard')

@section('content')


    <!-- DATE/TIME BAR -->
    
    <div class="mt-6 mb-8">
        <div class="mx-auto md:w-1/2 xl:w-1/3 flex justify-between rounded-full border border-gray-200 text-2xl text-gray-700 overflow-hidden">
            
            <form action="/dates" method="POST">
                @csrf
                <button
                    class="focus:outline-none"
                    type="submit"
                    name="previous"
                    value="{{ $shownDate->toDateString() }}"
                >
                    <div class="bg-blue-300 hover:bg-blue-400 py-2 px-4">
                        <i class="fas fa-angle-left"></i>
                    </div>
                </button>
            </form>
                
            <div>
                <form action="/dates" method="POST">
                    @csrf
                    <input
                        class="text-gray-600 hover:text-black focus:text-black focus:outline-none ml-6 xl:ml-16 mt-2"
                        type="date"
                        id="date-picker"
                        name="date"
                        value="{{ $shownDate->toDateString() }}"
                        max="{{ currentDate()->toDateString() }}"
                    >
                    <input type="submit" hidden>
                </form>
            </div>
            @if($shownDate->isSameDay(currentDate()))
                <div class="py-2 px-4"></div>
            @else
                <form action="/dates" method="POST">
                    @csrf
                    <button
                        class="focus:outline-none"
                        type="submit"
                        name="next"
                        value="{{ $shownDate->toDateString() }}"
                        {{ $shownDate->isSameDay(currentDate()) ? 'disabled' : '' }}
                    >
                        <div class="bg-blue-300 hover:bg-blue-400 py-2 px-4">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </button>
                </form>
            @endif
        </div>
    </div>
    
    
    <!-- LOG OVERVIEW -->
    
    <div class="lg:flex">
        <div class="lg:w-1/2 mb-8 lg:mr-8">
            <div class="bg-white border border-blue-500">
                <table class="w-full">
                    <thead>
                        <div class="bg-blue-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2">
                            Logs
                        </div>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log)
                            <tr class="w-full text-sm md:text-md lg:text-lg xl:text-xl text-center font-semibold text-gray-700">
                                <td class="w-1/6 bg-blue-100 py-4">
                                    {{ $log->created_at->isoFormat('HH:mm') }}
                                </td>
                                <td class="w-2/3 bg-blue-200 p-4">
                                    {{ $log->product->name }}
                                    
                                    @isset($log->product->brand)
                                        ({{ $log->product->brand }})
                                    @endisset
                                    
                                    - {{ $log->quantity }} g
                                </td>
                                <td class="w-1/6 bg-blue-300 text-gray-600 py-4">
                                    <button class="log-info hover:text-white focus:text-white block xl:inline mx-auto mb-3">
                                        <i class="fas fa-level-down-alt"></i>
                                    </button>
                                    
                                    <a
                                        class="hover:text-orange-400 focus:text-orange-400 block xl:inline xl:px-3 mb-3"
                                        href="/logs/{{ $log->id }}/edit"
                                    >
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                    <form
                                        action="/logs/{{ $log->id }}"
                                        method="POST"
                                        class="xl:inline"
                                    >
                                        @csrf
                                        @method('delete')
                                        <button
                                            type="submit"
                                            onclick="return confirm('Are you sure you want to delete this log?');"
                                            class="hover:text-red-500 focus:text-red-500"
                                        >
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                                <tr class="hidden">
                                    <td class="w-1/6 bg-blue-100 pb-2"></td>
                                    <td class="w-2/3 bg-blue-200 pb-2 px-4">
                                        <table class="w-full font-semibold text-xs md:text-sm text-gray-600">
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
                                                    Carbs:
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
        
        <div class="lg:w-1/2 bg-gray-100 rounded-lg shadow-lg">
            <div class="bg-indigo-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
                Nutritional Intake
            </div>
            <div class="p-4">
                <div class="md:flex md:justify-around mx-auto text-gray-700">            
                    @if (! $logs->isEmpty())
                        <div class="md:w-1/2 mb-6">
                            <div class="text-center text-lg lg:text-2xl font-semibold py-4">
                                Current Ratio
                            </div>
                            <div>
                                <total-pie-chart :total-intake=@json($totalIntake)></total-pie-chart>
                            </div>
                        </div>
                    @endif
                    
                    <div class="md:w-1/2 mb-6">
                        <div class="text-center text-lg lg:text-2xl font-semibold py-4">
                            Optimal Ratio
                        </div>
                        <div>
                            <required-pie-chart :required-intake=@json($requiredIntake)></required-pie-chart>
                        </div>
                    </div>
                </div>
                
                <div class="xl:flex xl:justify-around my-5">
                    <div class="w-2/3 xl:w-1/3 mt-10 mx-auto">
                        <table class="w-full table-fixed border border-indigo-200 shadow-sm">
                            <thead>
                                <div class="bg-indigo-400 text-center text-xl font-bold text-white uppercase py-2">
                                    Current Total
                                </div>
                            </thead>
                            
                            <tbody class="bg-indigo-100 text-sm font-semibold text-gray-700">
                                <tr>
                                    <td class="w-39 p-3">Energy:</td>
                                    <td class="p-3 text-gray-600">
                                        {{ $totalIntake->energy }} kcal
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3">Protein:</td>
                                    <td class="p-3 text-gray-600">
                                        {{ $totalIntake->protein }} g
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3">Fat:</td>
                                    <td class="p-3 text-gray-600">
                                        {{ $totalIntake->fat }} g
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3">Carbs:</td>
                                    <td class="p-3 text-gray-600">
                                        {{ $totalIntake->carbs }} g
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-2/3 xl:w-1/3 mt-10 mx-auto">
                        <table class="w-full table-fixed border border-indigo-200 shadow-sm">
                            <thead>
                                <div class="bg-indigo-400 text-center text-xl font-bold text-white uppercase py-2">
                                    Required
                                </div>
                            </thead>
                            <tbody class="bg-indigo-100 text-sm font-semibold text-gray-700">
                                <tr>
                                    <td class="w-39 p-3">Energy:</td>
                                    <td class="p-3 text-gray-600">
                                        {{ $requiredIntake->energy - $totalIntake->energy }} kcal
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3">Protein:</td>
                                    <td class="p-3 text-gray-600">
                                        {{ $requiredIntake->protein - $totalIntake->protein }} g
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3">Fat:</td>
                                    <td class="p-3 text-gray-600">
                                        {{ $requiredIntake->fat - $totalIntake->fat }} g
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-3">Carbs:</td>
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
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endpush