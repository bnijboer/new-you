<nav class="flex items-center p-3 flex-wrap">
    <a
        href="{{ route('dashboard') }}"
        class="p-2 mr-4 inline-flex items-center"
    >
        <img
            class="h-16 w-full object-cover ml-3"
            style="object-position: 50% 40%"
            src="{{ asset('images/logo.png') }}"
        >
    </a>
    <button
        class="nav-toggler lg:hidden inline-flex p-3 text-gray-600 hover:text-gray-900 ml-auto"
        data-target="#navigation"
    >
        <i class="fa fa-bars"></i>
    </button>
    
    <div
        class="top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto hidden"
        id="navigation"
    >
        <div class="lg:inline-flex lg:flex-row lg:ml-auto flex flex-col">
            <a
                href="{{ route('dashboard') }}"
                class="lg:inline-flex lg:w-auto text-gray-600 font-medium mx-3 py-2 lg:border-b border-white hover:text-gray-900 hover:border-gray-600 focus:border-gray-600"
            >
                Dashboard
            </a>
            <a
                href="/products/create"
                class="lg:inline-flex lg:w-auto text-gray-600 font-medium mx-3 py-2 lg:border-b border-white hover:text-gray-900 hover:border-gray-600 focus:border-gray-600"
            >
                Create Product
            </a>
            <a
                href="{{ route('products') }}"
                class="lg:inline-flex lg:w-auto text-gray-600 font-medium mx-3 py-2 lg:border-b border-white hover:text-gray-900 hover:border-gray-600 focus:border-gray-600"
            >
                Create Log
            </a>
            @if(currentDiet())
                <a
                    href="/diets/{{ currentDiet()->id }}"
                    class="lg:inline-flex lg:w-auto text-gray-600 font-medium mx-3 py-2 lg:border-b border-white hover:text-gray-900 hover:border-gray-600 focus:border-gray-600"
                >
                    View Diet
                </a>
            @else
                <a
                    href="/diets/create"
                    class="lg:inline-flex lg:w-auto text-gray-600 font-medium mx-3 py-2 lg:border-b border-white hover:text-gray-900 hover:border-gray-600 focus:border-gray-600"
                >
                    Create Diet
                </a>
            @endif
            <a
                href="/assistance"
                class="lg:inline-flex lg:w-auto text-gray-600 font-medium mx-3 py-2 lg:border-b border-white hover:text-gray-900 hover:border-gray-600 focus:border-gray-600"
            >
                Assistance
            </a>
            <a
                href="{{ route('profile', currentUser()->username) }}"
                class="lg:inline-flex lg:w-auto text-gray-600 font-medium mx-3 py-2 lg:border-b border-white hover:text-gray-900 hover:border-gray-600 focus:border-gray-600"
            >
                Profile
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full text-left lg:inline-flex lg:w-auto text-gray-600 font-medium mx-3 py-2 lg:border-b border-white hover:text-gray-900 hover:border-gray-600 focus:border-gray-600">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </div>
</nav>

@push('scripts')
    <script src="{{ asset('js/nav.js') }}"></script>
@endpush