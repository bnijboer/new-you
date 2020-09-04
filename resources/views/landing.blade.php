<x-master>

    @section('title', 'Start')

    <div class="container w-1/2 bg-blue-200 rounded-lg text-center mx-auto mt-20 p-4">

        <div class="text-2xl">
            Looking to get in shape?
        </div>

        <div class="mt-4 text-xl">
            New You makes dieting easy by offering an easy way to track your nutritional intake!
        </div>

        <div class="mt-8">
            <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('register') }}">
                Get Started
            </a>
        </div>

        <div class="mt-16">
            <div>
                Already have an account?
            </div>
            <div class="mt-4">
                <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('login') }}">
                    Login
                </a>
            </div>
        </div>

    </div>

</x-master>