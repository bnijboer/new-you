<x-master>
    
    <div
        class="bg-fixed bg-cover bg-center h-screen"
        style="background-image: url('../images/header.jpg')"
    >
        <div class="bg-blue-900 bg-opacity-75 h-screen">
            
            <div class="text-center pt-10 lg:pt-32 mb-6">
                @include('_logo')
            </div>
            
            <div class="w-3/4 md:w-1/2 xl:w-1/4 w-64 mx-auto bg-white rounded-lg shadow-lg text-center">
                <div class="bg-red-400 text-center md:text-xl lg:text-2xl text-white font-bold tracking-wider uppercase px-3 py-2 rounded-t-lg">
                    Something went wrong
                </div>
                <div class="px-4 pb-8">
                    <div class="mt-8 mb-12 text-sm md:text-lg">
                        @yield('content')
                    </div>
                    
                    <div>
                        <a
                            href="{{ url()->previous() }}"
                            class="mx-auto bg-gray-400 hover:bg-gray-500 text-white font-bold rounded-full uppercase px-5 py-3 focus:bg-gray-500"
                        >
                            Go Back
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>


</x-master>