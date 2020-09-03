<div class="sticky top-0 bg-gray-200 z-50 shadow-lg">
    <ul class="flex justify-between">
        <li>
            <ul class="flex">
                <li>
                    <a class="inline-block" href="{{ route('dashboard') }}">
                        <img class="h-16 w-full object-cover ml-3" style="object-position: 50% 40%" src="{{ asset('images/logo.png') }}">
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <ul class="flex">
                <li>
                    <button
                        id="hamburger"
                        class="inline-block text-2xl text-gray-600 hover:text-gray-700 focus:outline-none pt-4 px-4"
                    >
                        <i class="fa fa-bars"></i>
                    </button>
                </li>
            </ul>
            <div id="hamburgerLinks" class="hidden absolute right-0 bg-gray-100 border border-gray-300 bg-white text-gray-700 rounded-lg w-64 py-4">
                <ul>
                    <li class="hover:text-gray-800 hover:bg-blue-100 pl-16 py-2">
                        <a class="font-bold text-lg block" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="hover:text-gray-800 hover:bg-blue-100 pl-16 py-2">
                        <a class="font-bold text-lg block" href="{{ route('profile', currentUser()->username) }}">Profile</a>
                    </li>
                    <li class="hover:text-gray-800 hover:bg-blue-100 pl-16 py-2">
                        <a class="font-bold text-lg block" href="/products">All Products</a>
                    </li>
                    <li class="hover:text-gray-800 hover:bg-blue-100 pl-16 py-2">
                        <a class="font-bold text-lg block" href="/products/create">New Product</a>
                    </li>
                    <li class="hover:text-gray-800 hover:bg-blue-100 pl-16 py-2">
                        <a class="font-bold text-lg block" href="/search">New Log</a>
                    </li>
                    <li class="hover:text-gray-800 hover:bg-blue-100 pl-16 py-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="font-bold text-lg block">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>