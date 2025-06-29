<x-app-layout :title="isset($stock) ? 'Editar Peça' : 'Nova Peça'">
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($stock) ? __('Editar Peça') : __('Nova Peça') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            @if(isset($stock))
                <form action="{{ route('stock.update', $stock->id) }}" method="POST" class="space-y-6">
                @method('PUT')
            @else
                <form action="{{ route('stock.store') }}" method="POST" class="space-y-6">
            @endif
                @csrf

                <!-- SKU da Peça -->
                <div>
                    <label for="sku" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        SKU da Peça
                    </label>
                    <input
                        type="text"
                        name="sku"
                        id="sku"
                        value="{{ old('sku', $stock->sku ?? '') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('sku')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Marca -->
                <div>
                    <label for="marca" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Marca
                    </label>
                    <input
                        type="text"
                        name="marca"
                        id="marca"
                        value="{{ old('marca', $stock->marca ?? '') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('marca')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Modelo -->
                <div>
                    <label for="modelo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Modelo
                    </label>
                    <input
                        type="text"
                        name="modelo"
                        id="modelo"
                        value="{{ old('modelo', $stock->modelo ?? '') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('modelo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tipo -->
                <div>
                    <label for="tipo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Tipo
                    </label>
                    <input
                        type="text"
                        name="tipo"
                        id="tipo"
                        value="{{ old('tipo', $stock->tipo ?? '') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('tipo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Quantidade -->
                <div>
                    <label for="quantidade" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Quantidade
                    </label>
                    <input
                        type="number"
                        name="quantidade"
                        id="quantidade"
                        value="{{ old('quantidade', $stock->quantidade ?? '') }}"
                        required
                        min="0"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('quantidade')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Preço -->
                <div>
                    <label for="preco" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Preço
                    </label>
                    <input
                        type="number"
                        step="0.01"
                        name="preco"
                        id="preco"
                        value="{{ old('preco', $stock->preco ?? '') }}"
                        required
                        min="0"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('preco')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Fornecedor -->
                <div>
                    <label for="fornecedor" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Fornecedor
                    </label>
                    <input
                        type="text"
                        name="fornecedor"
                        id="fornecedor"
                        value="{{ old('fornecedor', $stock->fornecedor ?? '') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('fornecedor')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('stock.index') }}"
                        class="inline-flex justify-center rounded-md border border-gray-300
                            px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100
                            focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-300 dark:hover:bg-gray-700">
                        Cancelar
                    </a>

                    <button type="submit"
                        class="inline-flex justify-center rounded-md border border-gray-300
                            px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100
                            focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-300 dark:hover:bg-gray-700">
                        Salvar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>