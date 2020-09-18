<nav class="flex items-center bg-blue-800 p-3 flex-wrap">
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
        class="nav-toggler text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto"
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
                class="lg:inline-flex lg:w-auto px-3 py-2 rounded text-gray-400 hover:text-white hover:bg-gray-900"
            >
                Dashboard
            </a>
            <a
                href="{{ route('profile', currentUser()->username) }}"
                class="lg:inline-flex lg:w-auto px-3 py-2 rounded text-gray-400 hover:text-white hover:bg-gray-900"
            >
                Profile
            </a>
            <a
                href="/products/create"
                class="lg:inline-flex lg:w-auto px-3 py-2 rounded text-gray-400 hover:text-white hover:bg-gray-900"
            >
                Create Product
            </a>
            <a
                href="{{ route('products') }}"
                class="lg:inline-flex lg:w-auto px-3 py-2 rounded text-gray-400 hover:text-white hover:bg-gray-900"
            >
                Create Log
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="lg:inline-flex lg:w-auto w-full text-left px-3 py-2 rounded text-gray-400 hover:text-white hover:bg-gray-900">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </div>


</nav>

@push('scripts')
    <script src="{{ asset('js/nav.js') }}"></script>
@endpush