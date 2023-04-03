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
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css" crossorigin="anonymous"></link>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js" defer></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="relative max-w-full flex justify-center gap-32 flex-col min-h-screen selection:text-white">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <div class=" text__head__loop flex flex-row justify-center items-center">
                <span class="text__head">Fullstack Développer! </span>
                <span class="text__head">Fullstack Développer! </span>
                <span class="text__head">Fullstack Développer! </span>
                <span class="text__head">Fullstack Développer! </span>
                <span class="text__head">Fullstack Développer! </span>
            </div>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <div class="snipper">
                <div class="snipper__coint_1"></div>
                <div class="snipper__coint_2"></div>
                <div class="snipper__coint_3"></div>
                <div class="snipper__coint_4"></div>
                <p class="snipper__plus"></p>
            </div>
        </div>
    </body>
</html>
