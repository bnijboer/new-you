<x-master>
    @include('_navbar')

    <main class="w-screen flex">

        {{ $slot }}

        @include('_sidebar')
    </main>

</x-master>