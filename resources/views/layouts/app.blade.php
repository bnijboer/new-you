<x-master>
    @include('_navbar')

    <main class="w-screen flex">

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

</x-master>