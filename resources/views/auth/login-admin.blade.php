<x-guest-layout>
    <x-slot name="logo">
        <h1 class="text-2xl font-semibold mb-6 text-center">Login Admin</h1>
    </x-slot>

    <form method="POST" action="{{ route('login.admin') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" type="email" name="email" required autofocus class="w-full" />
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="mb-6">
            <x-input-label for="password" value="Senha" />
            <x-text-input id="password" type="password" name="password" required class="w-full" />
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="flex justify-between items-center mb-6 gap-4">
            <a href="{{ url('/login') }}"
               class="inline-block px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
                Voltar
            </a>

            <x-primary-button>
                Entrar
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
