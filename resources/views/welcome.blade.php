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
    <body>
        <div class="landing-page">
            <header class="page-container landing-nav">
                <a class="brand" href="{{ url('/') }}" aria-label="Campus home">
                    <span class="brand-mark" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none"><path d="M3 9.5 12 5l9 4.5-9 4.5-9-4.5Zm3.5 2v5c3.5 2.5 7.5 2.5 11 0v-5M21 10v5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </span>
                    <span class="brand-name">Campus<small>STUDENT PORTAL</small></span>
                </a>
                <nav class="landing-actions" aria-label="Main navigation">
                    @auth
                        <a class="landing-link" href="{{ route('dashboard') }}">Dashboard</a>
                    @else
                        @if (Route::has('login'))
                            <a class="landing-link" href="{{ route('login') }}">Sign in</a>
                        @endif
                        @if (Route::has('register'))
                            <a class="landing-button" href="{{ route('register') }}">Get started</a>
                        @endif
                    @endauth
                </nav>
            </header>

            <main class="page-container landing-hero">
                <section class="landing-copy">
                    <span class="landing-kicker">A BETTER WAY TO SUPPORT EVERY STUDENT</span>
                    <h1>Every student.<br>A <span>brighter</span> future.</h1>
                    <p>One calm, simple place to keep student records in view, celebrate progress, and make every next step count.</p>
                    <div class="landing-cta">
                        @auth
                            <a class="landing-button" href="{{ route('dashboard') }}">Go to your dashboard <span aria-hidden="true">&nbsp;→</span></a>
                        @else
                            @if (Route::has('register'))
                                <a class="landing-button" href="{{ route('register') }}">Create your account <span aria-hidden="true">&nbsp;→</span></a>
                            @endif
                            @if (Route::has('login'))
                                <a class="landing-secondary" href="{{ route('login') }}">Sign in</a>
                            @endif
                        @endauth
                    </div>
                </section>

                <div class="landing-visual" aria-hidden="true">
                    <div class="visual-glow"></div>
                    <div class="visual-board">
                        <div class="visual-board-top">
                            <span>Student overview</span>
                            <span class="visual-dots"><i></i><i></i><i></i></span>
                        </div>
                        <div class="visual-total">Growing together</div>
                        <div class="visual-caption">A little progress, every day</div>
                        <div class="visual-bars"><i></i><i></i><i></i><i></i><i></i><i></i><i></i></div>
                        <div class="visual-student-list">
                            <div class="visual-student"><span class="visual-student-avatar"></span><span class="visual-student-lines"><i></i><i></i></span><span class="visual-student-score"></span></div>
                            <div class="visual-student"><span class="visual-student-avatar"></span><span class="visual-student-lines"><i></i><i></i></span><span class="visual-student-score"></span></div>
                            <div class="visual-student"><span class="visual-student-avatar"></span><span class="visual-student-lines"><i></i><i></i></span><span class="visual-student-score"></span></div>
                        </div>
                    </div>
                    <div class="visual-note">
                        <span class="visual-note-icon">✓</span>
                        <span class="visual-note-copy">Every detail in one place<small>Clear, helpful, and easy to find</small></span>
                    </div>
                </div>
            </main>

            <footer class="page-container landing-bottom">
                A thoughtful space for student success.
            </footer>
        </div>
    </body>
</html>
