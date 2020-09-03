<x-master>
    
    @include('_navbar')
    
    <section>
        <header>
            @include('_header')
        </header>
    </section>
    
    <section>
        <main class="flex m-4">
            <div class="w-5/6 mr-4">
                @yield('content')
            </div>
            <div class="w-1/6">
                @include('_statsbar')
            </div>
            @if (session('success'))
                <div class="sticky bottom-0 w-40 h-32 float-right">
                    <div class="pr-3">
                        <div class="text-center border-2 border-green-300 rounded-lg shadow-md p-5">
                            <div class="text-3xl text-green-500">
                                <i class="fas fa-thumbs-up"></i>
                            </div>
                            <div class="text-md font-semibold">
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </main>
    </section>

            


</x-master>