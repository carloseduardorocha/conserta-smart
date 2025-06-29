<x-app-layout :title="'Visualizar Ordem de Serviço'">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ordem de Serviço - ' . $orderservice->nome) }}
            </h2>
            <a href="{{ route('orders.index') }}"
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
                <p class="mt-1 text-base">{{ $orderservice->nome }}</p>
            </div>

            <!-- SKU da Ordem de Serviço -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    SKU da Ordem de Serviço
                </label>
                <p class="mt-1 text-base">{{ $orderservice->sku }}</p>
            </div>

            <!-- Marca -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Marca
                </label>
                <p class="mt-1 text-base">{{ $orderservice->marca }}</p>
            </div>

            <!-- Modelo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Modelo
                </label>
                <p class="mt-1 text-base">{{ $orderservice->modelo }}</p>
            </div>

            <!-- Orçamento Prévio -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Orçamento Prévio
                </label>
                <p class="mt-1 text-base">R$ {{ number_format($orderservice->orcamento_previo, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
</x-app-layout>