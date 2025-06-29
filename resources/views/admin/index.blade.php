<x-app-layout title="Listagem de Usuários">
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Listagem de Usuários') }}
            </h2>

            <button onclick="copiarLink()" class="inline-flex justify-center rounded-md border border-gray-300
                px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100
                focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-300 dark:hover:bg-gray-700">
                Adicionar Usuário
            </button>
        </div>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700" style="text-align: left">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nome</th>
                                <th class="px-4 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Email</th>
                                <th class="px-4 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Tipo</th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($users as $user)
                                <tr>
                                    <td class="px-4 py-4 text-sm font-medium text-gray-900 dark:text-white">{{ $user->name }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300">{{ $user->email }}</td>
                                    <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 capitalize">{{ $user->type === 'admin' ? 'Administrador' : 'Funcionário' }}</td>
                                    <td class="px-4 py-4 text-sm text-center space-x-2">
                                        {{-- Visualizar --}}
                                        <a href="{{ route('admin.show', $user->id) }}" title="Visualizar" class="inline-flex items-center p-1 text-blue-500 hover:text-blue-700">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
                                                       -1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        @if(auth()->id() !== $user->id)
                                            <a href="{{ route('admin.edit', $user->id) }}" title="Editar" class="inline-flex items-center p-1 text-yellow-500 hover:text-yellow-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5h2m4.293 1.293a1 1 0 010 1.414l-8.5 8.5a1 1 0 01-.293.207L5 17l.586-3.5a1 1 0 01.207-.293l8.5-8.5a1 1 0 011.414 0z" />
                                                </svg>
                                            </a>
                                        @endif

                                        @if(auth()->id() !== $user->id)
                                            <form method="POST" action="{{ route('admin.destroy', $user->id) }}" class="inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Excluir" class="inline-flex items-center p-1 text-red-500 hover:text-red-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a1 1 0 011 1v0a1 1 0 01-1 1H6a1 1 0 01-1-1v0a1 1 0 011-1h12z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-4 text-center text-sm text-gray-500 dark:text-gray-300">
                                        Nenhum usuário encontrado.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function copiarLink() {
            navigator.clipboard.writeText("{{ url('register') }}").then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Link copiado!',
                    text: 'O link de registro foi copiado para a área de transferência.',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Você tem certeza?',
                        text: 'Esta ação não pode ser desfeita!',
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
                    showConfirmButton: false
                });
            @elseif(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: @json(session('error')),
                    timer: 2500,
                    showConfirmButton: false
                });
            @endif
        });
    </script>
</x-app-layout>
