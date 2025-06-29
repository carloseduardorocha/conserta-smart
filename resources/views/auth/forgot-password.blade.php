<x-guest-layout title="Esqueceu sua Senha">
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 text-justify">
        {{ __('Esqueceu sua senha? Sem problema. Basta nos informar seu endereço de e-mail e nós enviaremos um link para redefinir sua senha, que permitirá que você escolha uma nova.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex flex-col items-end mt-4 space-y-4">
            <div class="flex space-x-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
                        {{ __('Não tem uma conta?') }}
                    </a>
                @endif

                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Já tem uma conta?') }}
                </a>
            </div>
            <x-primary-button>
                {{ __('Enviar link para redefinição de senha') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
