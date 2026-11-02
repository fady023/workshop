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
        <main class="auth-page">
            <a class="brand auth-brand" href="{{ route('login') }}">
                <span class="brand-mark" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none"><path d="M3 9.5 12 5l9 4.5-9 4.5-9-4.5Zm3.5 2v5c3.5 2.5 7.5 2.5 11 0v-5M21 10v5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </span>
                <span class="brand-name">Campus<small>STUDENT PORTAL</small></span>
            </a>

            <section class="auth-card">
                <div class="auth-card-heading">
                    <span class="auth-emblem" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none"><path d="M12 3.5 14.6 9l6 .9-4.3 4.2 1 5.9-5.3-2.8-5.3 2.8 1-5.9-4.3-4.2 6-.9L12 3.5Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <p class="eyebrow">{{ request()->routeIs('register') ? 'GET STARTED' : 'WELCOME BACK' }}</p>
                    <h1>{{ request()->routeIs('register') ? __('Create your account') : __('Sign in to your account') }}</h1>
                    <p>{{ request()->routeIs('register') ? __('Join your student community and keep everything in one place.') : __('Pick up where you left off in your student workspace.') }}</p>
                </div>
                {{ $slot }}
            </section>

            <p class="auth-footer">A brighter future starts with the right support.</p>
        </main>
    </body>
</html>
