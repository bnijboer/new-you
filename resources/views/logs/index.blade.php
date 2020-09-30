@extends('layouts.app')

@section('title', 'Dashboard')

@section('banner-text', 'Dashboard')

@section('content')    

    <!-- DATE/TIME BAR -->
    
    <div class="my-8">
        <div class="mx-auto md:w-1/2 lg:w-1/3 xl:w-1/4 flex justify-between rounded-full border border-gray-200 text-xl text-gray-700 overflow-hidden">
            
            <form action="/dates" method="POST">
                @csrf
                <button
                    class="focus:outline-none"
                    type="submit"
                    name="previous"
                    value="{{ $shownDate->toDateString() }}"
                >
                    <div class="text-white bg-blue-200 hover:bg-blue-300 py-2 px-4">
                        <i class="fas fa-angle-left"></i>
                    </div>
                </button>
            </form>
                
            <div>
                <form action="/dates" method="POST">
                    @csrf
                    <input
                        class="bg-white text-gray-600 hover:text-black focus:text-black focus:outline-none ml-6 xl:ml-16 mt-2"
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
                        <div class="text-white bg-blue-200 hover:bg-blue-300 py-2 px-4">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </button>
                </form>
            @endif
        </div>
    </div>
    
    
    
    
    <div class="lg:flex lg:justify-around">
        
    
        <!-- LOG OVERVIEW -->
    
        <div class="w-full lg:w-1/2 xl:w-1/3 lg:mr-4 mb-8 lg:mb-0">
            <div class="bg-white rounded-lg shadow-lg">
                <div class="bg-blue-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
                    Logs
                </div>                
                <div class="py-4 px-6 text-gray-700">
                    @forelse($logs as $log)
                        <div class="{{ $loop->last ? 'mb-2' : 'mb-4' }}">
                            <div class="flex justify-around text-xs md:text-lg">
                                <div class="pr-8">
                                    {{ $log->created_at->isoFormat('HH:mm') }}
                                </div>
                                <div class="w-5/6">
                                        {{ $log->product->name }}
                                        
                                        @isset($log->product->brand)
                                            ({{ $log->product->brand }})
                                        @endisset
                                        
                                        - {{ $log->quantity }} g
                                </div>
                                <div>
                                    <button class="details-button text-gray-500 hover:text-blue-600 focus:text-blue-600 pt-2">
                                        <i class="fas fa-level-down-alt"></i>
                                    </button> 
                                </div>
                            </div>
                            <div class="log-details hidden">
                                <div class="table w-3/4 md:w-1/3 lg:w-7/12 xl:w-1/2 mx-auto text-xs md:text-sm lg:text-md font-light p-4 rounded-lg">
                                    <div class="table-row">
                                        <div class="table-cell pl-4 py-2 border-b border-gray-200 w-3/4">
                                            Energy
                                        </div>
                                        <div class="table-cell py-2 border-b border-gray-200">
                                            {{ $log->energy }} kcal
                                        </div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell pl-4 py-2 border-b border-gray-200">
                                            Protein
                                        </div>
                                        <div class="table-cell py-2 border-b border-gray-200">
                                            {{ $log->protein }} g
                                        </div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell pl-4 py-2 border-b border-gray-200">
                                            Fat
                                        </div>
                                        <div class="table-cell py-2 border-b border-gray-200">
                                            {{ $log->fat }} g
                                        </div>
                                    </div>
                                    <div class="table-row">
                                        <div class="table-cell pl-4 py-2 border-b border-gray-200">
                                            Carbs
                                        </div>
                                        <div class="table-cell py-2 border-b border-gray-200">
                                            {{ $log->carbs }} g
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center border-b border-dotted border-gray-300 pb-3 mt-1">
                                    <a
                                        class="bg-orange-400 hover:bg-orange-500 text-white font-bold rounded-full uppercase px-5 py-3 focus:bg-orange-500"
                                        href="/logs/{{ $log->id }}/edit"
                                    >
                                        Edit
                                    </a>
                                    
                                    <form
                                        action="/logs/{{ $log->id }}"
                                        method="POST"
                                        class="inline"
                                    >
                                        @csrf
                                        @method('delete')
                                        <button
                                            type="submit"
                                            onclick="return confirm('Are you sure you want to delete this log?');"
                                            class="bg-red-400 hover:bg-red-500 text-white font-bold rounded-full uppercase px-5 py-3 focus:bg-red-500 ml-3"
                                        >
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center">
                            <p>
                                No logs for this day so far.
                            </p>
                        </div>
                    @endforelse
                </div>
                <div class="text-center">
                    <p class="mt-5 pb-8">
                        <a
                            href="{{ route('products') }}"
                            class="bg-green-400 hover:bg-green-500 text-white font-bold rounded-full uppercase px-5 py-3 focus:bg-green-500"
                        >
                            Create Log
                        </a>
                    </p>
                </div>
            </div>
        </div>
        
        
        <!-- RATIO CHARTS AND TOTAL/REQUIRED INTAKE TABLES -->
        
        <div class="lg:w-1/2 rounded-lg shadow-lg">
            <div class="bg-blue-400 text-center text-2xl text-white font-bold tracking-wider uppercase py-2 rounded-t-lg">
                Nutritional Intake
            </div>
            <div class="text-gray-700 py-4 px-6">
                <div class="text-center mb-3">
                    @if(currentDiet())
                        <p>
                            You are currently on a 
                            <a 
                                class="font-bold hover:text-gray-900"
                                href="/diets/{{ currentDiet()->id }}"
                            >
                                <span>diet</span>
                            </a>.
                        </p>
                    @else
                        <p>
                            Your are currently eating at maintenance.
                        </p>
                        <p class="mt-8 mb-3">
                            <a
                                href="/diets/create"
                                class="bg-green-400 hover:bg-green-500 text-white font-bold rounded-full uppercase px-5 py-3 focus:bg-green-500"
                            >
                                Create Diet
                            </a>
                        </p>
                    @endif
                </div>
                <div class="md:flex md:justify-around mx-auto mt-10 text-gray-700">            
                    @if (! $logs->isEmpty())
                        <div class="md:w-1/2 mb-6">
                            <div class="text-center text-lg lg:text-2xl font-medium py-4">
                                Your Ratio
                            </div>
                            <div>
                                <total-pie-chart :total-intake=@json($totalIntake)></total-pie-chart>
                            </div>
                        </div>
                    @endif
                    
                    <div class="md:w-1/2 mb-6">
                        <div class="text-center text-lg lg:text-2xl font-medium py-4">
                            Optimal Ratio
                        </div>
                        <div>
                            <required-pie-chart :required-intake=@json($requiredIntake)></required-pie-chart>
                        </div>
                    </div>
                </div>
                
                <div class="xl:flex xl:justify-around my-5">
                    <div class="w-2/3 xl:w-1/3 mt-10 mx-auto">
                        <table class="w-full table-fixed shadow-md">
                            <thead>
                                <div class="bg-blue-400 text-center text-xl font-bold text-white uppercase py-2">
                                    Current Total
                                </div>
                            </thead>
                            
                            <tbody class="bg-blue-100 text-sm font-semibold text-gray-700">
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
                                    <td class="p-3">Carbs</td>
                                    <td class="p-3 text-gray-600">
                                        {{ $totalIntake->carbs }} g
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-2/3 xl:w-1/3 mt-10 mx-auto">
                        <table class="w-full table-fixed shadow-md">
                            <thead>
                                <div class="bg-blue-400 text-center text-xl font-bold text-white uppercase py-2">
                                    Still Required
                                </div>
                            </thead>
                            <tbody class="bg-blue-100 text-sm font-semibold text-gray-700">
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
                                    <td class="p-3">Carbs</td>
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
    <script src="{{ asset('js/log-details.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
@endpush