<x-app-layout :title="isset($order) ? 'Editar Ordem de Serviço' : 'Nova Ordem de Serviço'">
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($order) ? __('Editar Ordem de Serviço') : __('Nova Ordem de Serviço') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
            @if(isset($order))
                <form action="{{ route('orders.update', $order->id) }}" method="POST" class="space-y-6">
                    @method('PUT')
            @else
                <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
            @endif
                @csrf

                {{-- Cliente --}}
                <div>
                    <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Cliente
                    </label>
                    <select name="client_id" id="client_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="" disabled {{ !isset($order) ? 'selected' : '' }}>Selecione um cliente</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}"
                                {{ old('client_id', $order->client_id ?? '') == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('client_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Técnico --}}
                <div>
                    <label for="user_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Técnico Responsável
                    </label>
                    <select name="user_id" id="user_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="" disabled {{ !isset($order) ? 'selected' : '' }}>Selecione um técnico</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                {{ old('user_id', $order->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Descrição --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Descrição
                    </label>
                    <textarea name="description" id="description" rows="4"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                     focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">{{ old('description', $order->description ?? '') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status --}}
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Status
                    </label>
                    <select name="status" id="status" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                   focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <option value="pending" {{ old('status', $order->status ?? '') === 'pending' ? 'selected' : '' }}>Pendente</option>
                        <option value="in_progress" {{ old('status', $order->status ?? '') === 'in_progress' ? 'selected' : '' }}>Em andamento</option>
                        <option value="approved" {{ old('status', $order->status ?? '') === 'approved' ? 'selected' : '' }}>Aprovado</option>
                        <option value="rejected" {{ old('status', $order->status ?? '') === 'rejected' ? 'selected' : '' }}>Rejeitado</option>
                        <option value="cancelled" {{ old('status', $order->status ?? '') === 'cancelled' ? 'selected' : '' }}>Cancelado</option>
                        <option value="completed" {{ old('status', $order->status ?? '') === 'completed' ? 'selected' : '' }}>Concluído</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Itens do estoque --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Itens do Estoque
                    </label>
                    <div class="space-y-2 max-h-64 overflow-y-auto p-2 border rounded dark:border-gray-600">
                        @forelse ($stockItems as $item)
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" name="stock_items[]" id="item_{{ $item->id }}" value="{{ $item->id }}"
                                       {{ isset($selectedItems[$item->id]) ? 'checked' : '' }}
                                       class="text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                <label for="item_{{ $item->id }}" class="text-sm text-gray-800 dark:text-gray-200">
                                    {{ $item->name }} ({{ $item->quantity }} disponível)
                                </label>
                                <input type="number" name="quantities[{{ $item->id }}]"
                                       value="{{ $selectedItems[$item->id]['quantity'] ?? 1 }}"
                                       class="w-20 ml-auto text-sm rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                       min="1" max="{{ $item->quantity }}">
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 dark:text-gray-300">Nenhum item disponível no estoque.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Botões --}}
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
