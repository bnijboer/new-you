<x-master>
    
    <div class="relative bg-blue-900 h-screen">
        <img class="h-full w-full object-cover opacity-25" src="{{ asset('images/header.jpg') }}">
        <div class="absolute top-0 w-full h-full z-1">
        
            @yield('content')
            
        </div>
    </div>

</x-master>