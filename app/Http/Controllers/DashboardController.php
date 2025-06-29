<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\StockItem;
use App\Models\OrderService;

class DashboardController extends Controller
{
    public function index()
    {
        $technicians_count = User::count();
        $clients_count     = Client::count();
        $orders_total      = OrderService::count();
        $products_count    = StockItem::count();

        $orders_by_status = OrderService::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        // Mapeamento dos status para tradução em português
        $status_labels_map = [
            'pending'     => 'Pendente',
            'in_progress' => 'Em andamento',
            'approved'    => 'Aprovado',
            'rejected'    => 'Rejeitado',
            'cancelled'   => 'Cancelado',
            'completed'   => 'Concluído',
        ];

        // Monta array de labels para status presentes no banco
        $orders_status_labels = [];
        foreach (array_keys($orders_by_status) as $status) {
            $orders_status_labels[] = $status_labels_map[$status] ?? ucfirst(str_replace('_', ' ', $status));
        }

        return view('dashboard.index', compact(
            'technicians_count',
            'clients_count',
            'orders_total',
            'orders_by_status',
            'products_count',
            'orders_status_labels'
        ));
    }
}
