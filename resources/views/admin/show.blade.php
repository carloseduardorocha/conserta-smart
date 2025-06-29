<x-app-layout :title="'Visualizar Usuário'">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Usuário - ' . $user->name) }}
            </h2>
            <a href="{{ route('admin.index') }}"
                class="inline-flex justify-center rounded-md border border-gray-300
                    px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-300 dark:hover:bg-gray-700">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 space-y-6 text-gray-900 dark:text-gray-100">

            <!-- Nome -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Nome
                </label>
                <p class="mt-1 text-base">{{ $user->name }}</p>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Email
                </label>
                <p class="mt-1 text-base">{{ $user->email }}</p>
            </div>

            <!-- Tipo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Tipo
                </label>
                <p class="mt-1 text-base capitalize">{{ $user->type === 'admin' ? 'Administrador' : 'Funcionário' }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
