<x-app-layout title="Listagem de Clientes">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Listagem de Clientes') }}
            </h2>

            <a href="{{ route('clients.create') }}"
               class="inline-flex justify-center rounded-md border border-gray-300
                      px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100
                      focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-300 dark:hover:bg-gray-700">
                Novo Cliente
            </a>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                {{-- @if (session('success'))
                    <div id="alert-success" 
                        class="mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700 dark:bg-green-900 dark:text-green-300" 
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div id="alert-error"
                        class="mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700 dark:bg-red-900 dark:text-red-300"
                        role="alert">
                        {{ session('error') }}
                    </div>
                @endif --}}

                {{-- Tabela --}}
                <div class="overflow-x-auto">
                    <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700" style="text-align: left">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Nome
                                </th>
                                <th class="px-4 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-4 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Telefone
                                </th>
                                <th class="px-4 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    CPF
                                </th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($clients as $client)
                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-900 dark:text-white">
                                        {{ $client->name }}
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300">
                                        {{ $client->email }}
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300">
                                        {{ $client->phone }}
                                    </td>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300">
                                        {{ $client->cpf }}
                                    </td>
                                    <td class="px-4 py-4 text-sm text-center space-x-2">

                                        <a href="{{ route('clients.show', $client->id) }}" title="Visualizar"
                                           class="inline-flex items-center p-1 text-blue-500 hover:text-blue-700">
                                            {{-- Ícone Visualizar --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        <a href="{{ route('clients.edit', $client->id) }}" title="Editar"
                                           class="inline-flex items-center p-1 text-yellow-500 hover:text-yellow-700">
                                            {{-- Ícone Editar --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M11 5h2m4.293 1.293a1 1 0 010 1.414l-8.5 8.5a1 1 0 01-.293.207L5 17l.586-3.5a1 1 0 01.207-.293l8.5-8.5a1 1 0 011.414 0z" />
                                            </svg>
                                        </a>

                                        {{-- Form de exclusão --}}
                                        <form method="POST" action="{{ route('clients.destroy', $client->id) }}" class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Excluir"
                                                    class="inline-flex items-center p-1 text-red-500 hover:text-red-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a1 1 0 011 1v0a1 1 0 01-1 1H6a1 1 0 01-1-1v0a1 1 0 011-1h12z"/>
                                                </svg>
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-4 text-center text-sm text-gray-500 dark:text-gray-300">
                                        Nenhum cliente encontrado.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Intercepta submit do form de deletar para mostrar confirmação SweetAlert2
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Você tem certeza?',
                        text: "Esta ação não pode ser desfeita!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#4F46E5',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sim, deletar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso!',
                    text: @json(session('success')),
                    timer: 2500,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willClose: () => {
                        Swal.close();
                    }
                });
            @elseif(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: @json(session('error')),
                    timer: 2500,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    willClose: () => {
                        Swal.close();
                    }
                });
            @endif

            // Função para sumir o alerta com fade out
            function fadeOutEffect(element) {
                let opacity = 1;
                let timer = setInterval(function () {
                    if (opacity <= 0.1) {
                        clearInterval(timer);
                        element.style.display = 'none';
                    }
                    element.style.opacity = opacity;
                    opacity -= opacity * 0.1;
                }, 50);
            }

            let alertSuccess = document.getElementById('alert-success');
            if (alertSuccess) {
                setTimeout(() => fadeOutEffect(alertSuccess), 2500);
            }

            let alertError = document.getElementById('alert-error');
            if (alertError) {
                setTimeout(() => fadeOutEffect(alertError), 2500);
            }
        });
    </script>

</x-app-layout>
