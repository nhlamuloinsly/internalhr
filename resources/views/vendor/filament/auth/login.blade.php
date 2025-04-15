<x-filament::page>
    <form method="POST" action="{{ route('filament.auth.login') }}" class="space-y-6">
        @csrf

        <x-filament::input-wrapper id="email" label="Email" required>
            <x-filament::input id="email" type="email" name="email" required autofocus autocomplete="username" />
        </x-filament::input-wrapper>

        <x-filament::input-wrapper id="password" label="Password" required>
            <x-filament::input id="password" type="password" name="password" required autocomplete="current-password" />
        </x-filament::input-wrapper>

        <x-filament::checkbox-wrapper id="remember" name="remember" label="Remember me" />

        <x-filament::button type="submit" class="w-full">
            Log in
        </x-filament::button>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ $registerUrl ?? route('filament.pages.register-user') }}" class="text-sm text-primary-600 hover:underline">
            Register a new account
        </a>
    </div>
</x-filament::page>
