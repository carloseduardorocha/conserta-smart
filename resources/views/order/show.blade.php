<x-app-layout :title="'Ordem de Serviço #' . $order->id">
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ 'Ordem de Serviço #' . $order->id }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

            {{-- Status em português --}}
            @php
                $status_pt = [
                    'pending' => 'Pendente',
                    'in_progress' => 'Em andamento',
                    'approved' => 'Aprovado',
                    'rejected' => 'Rejeitado',
                    'cancelled' => 'Cancelado',
                    'completed' => 'Concluído',
                ];
            @endphp

            {{-- Cliente --}}
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Cliente</h3>
                <p class="text-gray-900 dark:text-gray-100">{{ $order->client->name }}</p>
            </div>

            {{-- Técnico --}}
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Técnico Responsável</h3>
                <p class="text-gray-900 dark:text-gray-100">{{ $order->user->name }}</p>
            </div>

            {{-- Descrição --}}
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Descrição</h3>
                <p class="whitespace-pre-line text-gray-900 dark:text-gray-100">{{ $order->description ?: '-' }}</p>
            </div>

            {{-- Status --}}
            <div class="mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Status</h3>
                <p class="text-gray-900 dark:text-gray-100">
                    {{ $status_pt[$order->status] ?? ucfirst(str_replace('_', ' ', $order->status)) }}
                </p>
            </div>

            {{-- Itens do Estoque --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">Itens do Estoque</h3>

                @if($order->stockItems->isEmpty())
                    <p class="text-gray-500 dark:text-gray-400">Nenhum item associado a esta ordem.</p>
                @else
                    <ul class="list-disc list-inside space-y-1 text-gray-900 dark:text-gray-100">
                        @foreach ($order->stockItems as $item)
                            <li>
                                {{ $item->name }} — Quantidade: {{ $item->pivot->quantity }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            {{-- Botão Voltar --}}
            <div class="mt-6">
                <a href="{{ route('orders.index') }}"
                   class="inline-flex justify-center rounded-md border border-gray-300
                          px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100
                          focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-300 dark:hover:bg-gray-700">
                    Voltar
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
