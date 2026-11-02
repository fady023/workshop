<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Campus · Student Portal</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700&family=manrope:400,500,600,700,800&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="app-shell">
            @include('layouts.navigation')

            @isset($header)
                <header class="page-heading">
                    <div class="page-container page-heading-inner">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="page-container app-main">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
