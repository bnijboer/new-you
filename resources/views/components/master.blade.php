<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
</head>

<body class="min-h-screen flex flex-col justify-between">
    <div id="app">
        {{ $slot }}
    </div>
    
    <footer class="bg-gray-200 bg-opacity-75 tracking-wide text-gray-600 text-center py-4">
        Brendan Nijboer ©
        <div class="inline pl-3">
            <a
                href="https://github.com/bnijboer/new-you"
                class="hover:text-gray-900"
                target="_blank"
            >
                <i class="fab fa-github"></i>
            </a>
            <a
                href="https://www.linkedin.com/in/brendan-nijboer-3966a1108/"
                class="hover:text-gray-900 pl-1"
                target="_blank"
            >
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
    </footer>
</body>