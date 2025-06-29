<x-app-layout :title="isset($orderservice) ? 'Editar Ordem de Serviço' : 'Nova Ordem de Serviço'">
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($orderservice) ? __('Editar Ordem de Serviço') : __('Nova Ordem de Serviço') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            @if(isset($orderservice))
                <form action="{{ route('orders.update', $orderservice->id) }}" method="POST" class="space-y-6">
                @method('PUT')
            @else
                <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
            @endif
                @csrf

                <!-- Nome -->
                <div>
                    <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Nome
                    </label>
                    <input
                        type="text"
                        name="nome"
                        id="nome"
                        value="{{ old('nome', $orderservice->nome ?? '') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('nome')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- SKU da Ordem de Serviço -->
                <div>
                    <label for="sku" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        SKU da Ordem de Serviço
                    </label>
                    <input
                        type="text"
                        name="sku"
                        id="sku"
                        value="{{ old('sku', $orderservice->sku ?? '') }}"
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
                        value="{{ old('marca', $orderservice->marca ?? '') }}"
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
                        value="{{ old('modelo', $orderservice->modelo ?? '') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('modelo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Orçamento Prévio -->
                <div>
                    <label for="orcamento_previo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Orçamento Prévio
                    </label>
                    <input
                        type="number"
                        step="0.01"
                        name="orcamento_previo"
                        id="orcamento_previo"
                        value="{{ old('orcamento_previo', $orderservice->orcamento_previo ?? '') }}"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                               focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                    >
                    @error('orcamento_previo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botões -->
                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('orders.index') }}"
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