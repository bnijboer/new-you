<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>New You</title>

        <link href="" rel="stylesheet">
    </head>
    <body>
        {{ $slot }}
    </body>
</html>