<x-guest-layout>
        <x-slot name="logo">
            <h1>Login ADM</h1>
        </x-slot>

        <form method="POST" action="{{ route('login.admin') }}">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" type="email" name="email" required autofocus />
                <x-input-error :messages="$errors->get('email')" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" value="Senha" />
                <x-text-input id="password" type="password" name="password" required />
                <x-input-error :messages="$errors->get('password')" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>Entrar</x-primary-button>
            </div>
        </form>
</x-guest-layout>
