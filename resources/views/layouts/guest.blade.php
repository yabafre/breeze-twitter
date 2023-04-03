<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="relative max-w-full flex justify-center items-center gap-10 flex-col min-h-screen selection:text-white">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-white" />
                </a>
            </div>
            <div class=" text__head__loop flex flex-row justify-center items-center">
                <span class="text__head">Fullstack Développer! </span>
                <span class="text__head">Fullstack Développer! </span>
                <span class="text__head">Fullstack Développer! </span>
                <span class="text__head">Fullstack Développer! </span>
                <span class="text__head">Fullstack Développer! </span>
            </div>

            <div class="form__card__works parent-contain">
                <span class="card__works coint-1"></span>
                <span class="card__works coint-2"></span>
                <span class="card__works coint-3"></span>
                <span class="card__works coint-4"></span>
                {{ $slot }}
            </div>
        </div>
        <div class="snipper">
            <div class="snipper__coint_1"></div>
            <div class="snipper__coint_2"></div>
            <div class="snipper__coint_3"></div>
            <div class="snipper__coint_4"></div>
            <p class="snipper__plus"></p>
        </div>
    </body>
</html>
