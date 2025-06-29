<x-app-layout :title="isset($item) ? 'Editar Item' : 'Novo Item'">
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($item) ? __('Editar Item') : __('Novo Item') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            @if(isset($item))
                <form action="{{ route('stock.update', $item->id) }}" method="POST" class="space-y-6">
                @method('PUT')
            @else
                <form action="{{ route('stock.store') }}" method="POST" class="space-y-6">
            @endif
                @csrf

                <!-- Nome -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nome
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name', $item->name ?? '') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Marca e Modelo na mesma linha -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="brand" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Marca
                        </label>
                        <input
                            type="text"
                            name="brand"
                            id="brand"
                            value="{{ old('brand', $item->brand ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        >
                        @error('brand')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="model" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Modelo
                        </label>
                        <input
                            type="text"
                            name="model"
                            id="model"
                            value="{{ old('model', $item->model ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        >
                        @error('model')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tipo e Quantidade na mesma linha -->
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    <div class="md:col-span-8">
                        <label for="type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Tipo
                        </label>
                        <select
                            name="type"
                            id="type"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        >
                            <option value="" disabled {{ old('type', $item->type ?? '') == '' ? 'selected' : '' }}>Selecione um tipo</option>
                            <option value="eletrônico" {{ old('type', $item->type ?? '') == 'eletrônico' ? 'selected' : '' }}>Eletrônico</option>
                            <option value="mecânico" {{ old('type', $item->type ?? '') == 'mecânico' ? 'selected' : '' }}>Mecânico</option>
                            <option value="outro" {{ old('type', $item->type ?? '') == 'outro' ? 'selected' : '' }}>Outro</option>
                        </select>
                        @error('type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-4">
                        <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Quantidade
                        </label>
                        <input
                            type="number"
                            name="quantity"
                            id="quantity"
                            min="0"
                            value="{{ old('quantity', $item->quantity ?? '') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                        >
                        @error('quantity')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Preço de Compra e Preço de Venda lado a lado com máscara -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="purchase_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Preço de Compra
                        </label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none dark:text-gray-400">
                                R$
                            </div>
                            <input
                                type="text"
                                name="purchase_price"
                                id="purchase_price"
                                value="{{ old('purchase_price', isset($item->purchase_price) ? number_format($item->purchase_price, 2, ',', '.') : '') }}"
                                required
                                class="block w-full pl-8 rounded-md border-gray-300 shadow-sm
                                       focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            >
                        </div>
                        @error('purchase_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sale_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Preço de Venda
                        </label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none dark:text-gray-400">
                                R$
                            </div>
                            <input
                                type="text"
                                name="sale_price"
                                id="sale_price"
                                value="{{ old('sale_price', isset($item->sale_price) ? number_format($item->sale_price, 2, ',', '.') : '') }}"
                                required
                                class="block w-full pl-8 rounded-md border-gray-300 shadow-sm
                                       focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            >
                        </div>
                        @error('sale_price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Fornecedor -->
                <div>
                    <label for="supplier" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Fornecedor
                    </label>
                    <input
                        type="text"
                        name="supplier"
                        id="supplier"
                        value="{{ old('supplier', $item->supplier ?? '') }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('supplier')
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

    <!-- Scripts de máscara -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#cpf').mask('000.000.000-00'); // Caso ainda precise do cpf, senão pode remover
            $('#phone').mask('+00 (00) 00000-0000'); // Caso ainda precise do telefone, senão pode remover
            $('#purchase_price, #sale_price').mask('000.000.000.000,00', {reverse: true});
        });
    </script>
</x-app-layout>
