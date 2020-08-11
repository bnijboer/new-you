<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'New You') }} - @yield('title')</title>
    
    <!-- <script src="http://unpkg.com/turbolinks"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
    
    @stack('scripts')
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        
    @endpush
</head>

<body>

    <div id="app">
        {{ $slot }}
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- <script src="{{ asset('js/ratio-calculator.js') }}" defer></script> -->
    <!-- <script src="{{ asset('js/search.js') }}" defer></script> -->
</body>