<nav x-data="{ open: false }" class="site-nav">
    <div class="page-container nav-inner">
        <a class="brand" href="{{ route('dashboard') }}" aria-label="Campus home">
            <span class="brand-mark" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><path d="M3 9.5 12 5l9 4.5-9 4.5-9-4.5Zm3.5 2v5c3.5 2.5 7.5 2.5 11 0v-5M21 10v5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <span class="brand-name">Campus<small>STUDENT PORTAL</small></span>
        </a>

        <div class="desktop-nav">
            <a href="{{ route('dashboard') }}" @class(['nav-item', 'is-active' => request()->routeIs('dashboard')])>
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 13h7V4H4v9Zm0 7h7v-4H4v4Zm11 0h5V11h-5v9Zm0-16v4h5V4h-5Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Dashboard
            </a>
        </div>

        <div class="nav-account">
            <span class="account-avatar">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr(Auth::user()->name ?? '?', 0, 1)) }}</span>
            <div class="account-copy">
                <span class="account-name">{{ Auth::user()->name }}</span>
                <span class="account-label">Your account</span>
            </div>
            <x-dropdown align="right" width="48" contentClasses="py-1 bg-white dropdown-menu">
                <x-slot name="trigger">
                    <button class="account-menu-button" aria-label="Open account menu">
                        <svg viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.09 1.03l-4.25 4.5a.75.75 0 0 1-1.09 0l-4.25-4.5a.75.75 0 0 1 .02-1.05Z" clip-rule="evenodd"/></svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">{{ __('Profile settings') }}</x-dropdown-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

        <button class="mobile-menu-button" type="button" @click="open = !open" :aria-expanded="open.toString()" aria-label="Toggle navigation">
            <svg x-show="!open" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            <svg x-show="open" x-cloak viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m6 6 12 12M18 6 6 18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        </button>
    </div>

    <div class="mobile-nav" x-show="open" x-cloak x-transition>
        <a href="{{ route('dashboard') }}" @class(['mobile-nav-link', 'is-active' => request()->routeIs('dashboard')])>Dashboard</a>
        <a href="{{ route('profile.edit') }}" @class(['mobile-nav-link', 'is-active' => request()->routeIs('profile.*')])>Profile settings</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="mobile-nav-link">Log out</button>
        </form>
    </div>
</nav>
