<x-app-layout>
    <x-slot name="header">
        <div class="page-heading-copy">
            <p class="eyebrow">YOUR ACCOUNT</p>
            <h1>{{ __('Profile settings') }}</h1>
            <p>Manage your personal information and account security.</p>
        </div>
    </x-slot>

    <div class="profile-content">
        <section class="profile-card">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </section>

        <section class="profile-card">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </section>

        <section class="profile-card">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </section>
    </div>
</x-app-layout>
