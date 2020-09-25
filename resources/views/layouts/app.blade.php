<x-master>
    
    @include('_navbar')
    
    @if (session('success'))
        <div class="border-green-300 bg-green-200 tracking-wide text-center text-lg text-gray-800 font-semibold shadow-md py-4">
            {{ session('success') }}
        </div>
    @endif
    
    <!-- DIET ENDS NOTIFATION -->
    <section>
        @if(currentDiet())
            @if (Carbon\Carbon::parse(currentDiet()->ends_at)->isToday())
            
                {{ currentUser()->endDiet() }}
                
                <div class="m-4 text-center border border-dotted border-green-200 lg:text-lg rounded-lg shadow-lg p-8">
                    
                    <p class="uppercase text-green-500 text-2xl font-bold tracking-wider">
                        Well done!
                    </p>
                    <p class="mt-3 text-green-500 font-semibold">
                        You have completed your diet!
                    </p>
                    <p class="mt-8 text-gray-600 text-sm">
                        Would you like to update your current weight?
                    </p>
                    
                    <form
                        class="mt-2"
                        action="/update-weight"
                        method="POST"
                    >
                        @csrf
                        @method('patch')
                        
                        <input
                            class="border border-gray-400 rounded-lg p-3 w-20"
                            type="number"
                            name="current_weight"
                            id="current_weight"
                            value="{{ currentUser()->current_weight }}"
                            required
                        >
                        
                         kg
                        
                        @error('current_weight')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        
                        <button
                            type="submit"
                            class="mt-3 ml-4 bg-green-500 hover:bg-green-700 text-white font-bold rounded-lg uppercase px-5 py-3"
                        >
                            Update
                        </button>
                    </form>
                </div>
            @endif
        @endif
    </section>
    
    <section>
        <header>
            @include('_header')
        </header>
    </section>
    
    <section>
        <main class="m-4">
            @yield('content')
        </main>
    </section>

</x-master>