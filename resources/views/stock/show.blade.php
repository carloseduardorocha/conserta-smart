<x-app-layout :title="'Visualizar Peça'">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Peça - ' . $stock->sku) }}
            </h2>
            <a href="{{ route('stock.index') }}"
                class="inline-flex justify-center rounded-md border border-gray-300
                    px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100
                    focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-300 dark:hover:bg-gray-700">
                Voltar
            </a>
        </div>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 space-y-6 text-gray-900 dark:text-gray-100">
            <!-- SKU da Peça -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    SKU da Peça
                </label>
                <p class="mt-1 text-base">{{ $stock->sku }}</p>
            </div>

            <!-- Marca -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Marca
                </label>
                <p class="mt-1 text-base">{{ $stock->marca }}</p>
            </div>

            <!-- Modelo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Modelo
                </label>
                <p class="mt-1 text-base">{{ $stock->modelo }}</p>
            </div>

            <!-- Tipo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Tipo
                </label>
                <p class="mt-1 text-base">{{ $stock->tipo }}</p>
            </div>

            <!-- Quantidade -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Quantidade
                </label>
                <p class="mt-1 text-base">{{ $stock->quantidade }}</p>
            </div>

            <!-- Preço -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Preço
                </label>
                <p class="mt-1 text-base">R$ {{ number_format($stock->preco, 2, ',', '.') }}</p>
            </div>

            <!-- Fornecedor -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Fornecedor
                </label>
                <p class="mt-1 text-base">{{ $stock->fornecedor }}</p>
            </div>
        </div>
    </div>
</x-app-layout>