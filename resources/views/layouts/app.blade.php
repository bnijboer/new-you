<x-master>
    
    @include('_navbar')
    
    @if (session('success'))
        <div class="border-green-300 bg-green-200 tracking-wide text-center text-lg text-gray-800 font-semibold shadow-md py-4">
            {{ session('success') }}
        </div>
    @endif
    
    <section>
        <header>
            @include('_header')
        </header>
    </section>
    
    <section>
        <main class="m-4">
            <div>
                @yield('content')
            </div>
            <!-- <div class="w-1/6">
                @include('_statsbar')
            </div> -->
        </main>
    </section>

            


</x-master>