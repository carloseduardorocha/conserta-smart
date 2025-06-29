
<x-app-layout title="Relatórios">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Relatórios') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow space-y-4">
            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Selecione um relatório para baixar</h3>

            <form action="{{ route('reports.download') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="report" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tipo de relatório</label>
                    <select name="report" id="report" class="mt-1 block w-full rounded border-gray-300 dark:bg-gray-900 dark:text-gray-100 shadow-sm">
                        <option value="technicians">Técnicos</option>
                        <option value="clients">Clientes</option>
                        <option value="orders">Ordens de Serviço</option>
                        <option value="products">Produtos</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Baixar PDF</button>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
