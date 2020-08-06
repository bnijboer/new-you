<x-master>
    @include('_navbar')

    <main class="w-screen flex">

        <div class="flex-1 bg-green-300">
            {{ $slot }}
        </div>
        
        <div class="bg-purple-300 rounded">
            @include('_sidebar')
        </div>

    </main>

</x-master>