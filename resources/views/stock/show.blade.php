<x-app-layout :title="'Visualizar Item - ' . $item->name">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Item - ' . $item->name) }}
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

            <!-- Nome -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Nome
                </label>
                <p class="mt-1 text-base">{{ $item->name }}</p>
            </div>

            <!-- Marca e Modelo na mesma linha -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Marca
                    </label>
                    <p class="mt-1 text-base">{{ $item->brand }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Modelo
                    </label>
                    <p class="mt-1 text-base">{{ $item->model }}</p>
                </div>
            </div>

            <!-- Tipo e Quantidade na mesma linha -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <div class="md:col-span-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Tipo
                    </label>
                    <p class="mt-1 text-base">{{ ucfirst($item->type) }}</p>
                </div>
                <div class="md:col-span-6">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Quantidade
                    </label>
                    <p class="mt-1 text-base">{{ $item->quantity }}</p>
                </div>
            </div>

            <!-- Preço de Compra e Preço de Venda lado a lado -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Preço de Compra
                    </label>
                    <p class="mt-1 text-base">
                        R$ {{ number_format($item->purchase_price, 2, ',', '.') }}
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Preço de Venda
                    </label>
                    <p class="mt-1 text-base">
                        R$ {{ number_format($item->sale_price, 2, ',', '.') }}
                    </p>
                </div>
            </div>

            <!-- Fornecedor -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Fornecedor
                </label>
                <p class="mt-1 text-base">{{ $item->supplier ?? '-' }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
