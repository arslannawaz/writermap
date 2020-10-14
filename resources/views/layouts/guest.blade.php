<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body class="bg-default h-screen">
        <div class="grid grid-cols-3 login-background absolute z-0 invisible lg:visible">
            <div class="col-span-2"></div>
            <div class="col-span-1"></div>
        </div>

        <div class="container relative z-10 h-full mx-auto">

            <div class="antialiased h-full">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
