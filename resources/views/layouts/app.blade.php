<x-master>
    @include('_navbar')

    <main class="flex m-4">
        <div class="w-5/6 mr-4">
            @yield('content')
        </div>
        <div class="w-1/6">
            @include('_sidebar')
            @include('_statsbar')
        </div>
    </main>
            
    @if (session('success'))
        <div class="sticky bottom-0 w-32 h-32 float-right">
            <div class="p-3">
                <div class="text-center text-xl font-semibold bg-green-400 rounded-lg shadow-2xl p-5">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

</x-master>