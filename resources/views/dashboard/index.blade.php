<x-app-layout title="Dashboard">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

        {{-- Cards de resumo --}}
        <div class="grid grid-cols-[repeat(auto-fit,minmax(220px,1fr))] justify-center gap-6">

            @if(auth()->user()->type === 'admin')
            {{-- Técnicos --}}
            <a href="{{ route('admin.index') }}" class="block bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col items-center hover:ring-2 hover:ring-indigo-500 transition">
                <div class="text-indigo-600 dark:text-indigo-400 mb-2">
                    <!-- User Group Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m5-3a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                </div>
                <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $technicians_count }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Técnicos</div>
            </a>
            @endif

            {{-- Clientes --}}
            <a href="{{ route('clients.index') }}" class="block bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col items-center hover:ring-2 hover:ring-green-500 transition">
                <div class="text-green-600 dark:text-green-400 mb-2">
                    <!-- User Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A6 6 0 0112 15a6 6 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $clients_count }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Clientes</div>
            </a>

            {{-- Ordens de Serviço --}}
            <a href="{{ route('orders.index') }}" class="block bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col items-center hover:ring-2 hover:ring-yellow-500 transition">
                <div class="text-yellow-600 dark:text-yellow-400 mb-2">
                    <!-- Clipboard List Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V7a2 2 0 012-2h3l2-2 2 2h3a2 2 0 012 2v11a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $orders_total }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Ordens de Serviço</div>
            </a>

            @if(auth()->user()->type === 'admin')
            {{-- Produtos --}}
            <a href="{{ route('stock.index') }}" class="block bg-white dark:bg-gray-800 shadow rounded-lg p-6 flex flex-col items-center hover:ring-2 hover:ring-pink-500 transition">
                <div class="text-pink-600 dark:text-pink-400 mb-2">
                    <!-- Cube Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7" />
                    </svg>
                </div>
                <div class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $products_count }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400 mt-1">Produtos</div>
            </a>
            @endif
        </div>

        {{-- Gráfico de status --}}
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 max-w-md mx-auto">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Status das Ordens de Serviço</h3>
            <canvas id="ordersStatusChart" width="400" height="400"></canvas>
        </div>

    </div>

    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('ordersStatusChart').getContext('2d');

            const data = {
                labels: @json($orders_status_labels),
                datasets: [{
                    label: 'Quantidade',
                    data: @json(array_values($orders_by_status)),
                    backgroundColor: [
                        '#3b82f6', // blue
                        '#10b981', // green
                        '#f59e0b', // yellow
                        '#ef4444', // red
                        '#6b7280', // gray
                        '#8b5cf6'  // purple
                    ],
                    hoverOffset: 20
                }]
            };

            new Chart(ctx, {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '{{ auth()->user()->dark_mode ? "#d1d5db" : "#374151" }}'
                            }
                        },
                        tooltip: {
                            enabled: true,
                        }
                    }
                }
            });
        });
    </script>

</x-app-layout>
