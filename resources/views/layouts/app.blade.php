<x-master>
    @include('_navbar')

    <main class="flex">

        <div class="w-5/6">
            @yield('content')
        </div>
        
        <div class="w-1/6 mr-4 mt-4">
            <div class="bg-purple-200 rounded">
                @include('_sidebar')
            </div>
            <div class="bg-purple-300 rounded">
                @include('_statsbar')
            </div>
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