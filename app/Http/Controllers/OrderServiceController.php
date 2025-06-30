<?php

namespace App\Http\Controllers;

use App\Models\{OrderService, Client, User, StockItem};
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderServiceController extends Controller
{
    public function index()
    {
        $orders = OrderService::with(['client', 'user', 'stockItems'])->latest()->paginate(10);
        return view('order.index', compact('orders'));
    }

    public function create()
    {
        $clients = Client::all();
        $users = User::all();
        $stockItems = StockItem::where('quantity', '>', 0)->get();

        return view('order.edit', [
            'order' => null,
            'clients' => $clients,
            'users' => $users,
            'stockItems' => $stockItems,
            'selectedItems' => [],
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id'   => 'required|exists:clients,id',
            'user_id'     => 'required|exists:users,id',
            'description' => 'required|string',
            'status'      => 'required|in:pending,in_progress,approved,rejected,cancelled,completed',
            'stock_items' => 'array',
            'stock_items.*' => 'integer|exists:stock_items,id',
            'quantities' => 'array',
            'quantities.*' => 'integer|min:1',
        ]);

        DB::transaction(function () use ($validated) {
            $order = OrderService::create([
                'client_id'   => $validated['client_id'],
                'user_id'     => $validated['user_id'],
                'description' => $validated['description'] ?? '',
                'status'      => $validated['status'],
            ]);

            $items_to_attach = [];

            foreach ($validated['stock_items'] ?? [] as $stock_item_id) {
                $quantity = $validated['quantities'][$stock_item_id] ?? 1;
                $stock = StockItem::findOrFail($stock_item_id);

                if ($stock->quantity < $quantity) {
                    throw new Exception("Estoque insuficiente para o produto: {$stock->name}");
                }

                $items_to_attach[$stock_item_id] = ['quantity' => $quantity];
                $stock->decrement('quantity', $quantity);
            }

            if (!empty($items_to_attach)) {
                $order->stockItems()->attach($items_to_attach);
            }
        });

        return redirect()->route('orders.index')
            ->with('success', 'Ordem de serviço criada com sucesso!');
    }

    public function show(string $id)
    {
        $order = OrderService::with(['client', 'user', 'stockItems'])->findOrFail($id);
        return view('order.show', compact('order'));
    }

    public function edit(string $id)
    {
        $order = OrderService::with('stockItems')->findOrFail($id);
        $clients = Client::all();
        $users = User::all();
        $stockItems = StockItem::where('quantity', '>', 0)->get();

        $selectedItems = [];
        foreach ($order->stockItems as $item) {
            $selectedItems[$item->id] = [
                'quantity' => $item->pivot->quantity,
            ];
        }

        return view('order.edit', compact('order', 'clients', 'users', 'stockItems', 'selectedItems'));
    }

    public function update(Request $request, string $id)
    {
        $order = OrderService::with('stockItems')->findOrFail($id);

        $validated = $request->validate([
            'client_id'   => 'required|exists:clients,id',
            'user_id'     => 'required|exists:users,id',
            'description' => 'required|string',
            'status'      => 'required|in:pending,in_progress,approved,rejected,cancelled,completed',
            'stock_items' => 'array',
            'stock_items.*' => 'integer|exists:stock_items,id',
            'quantities' => 'array',
            'quantities.*' => 'integer|min:1',
        ]);

        DB::transaction(function () use ($order, $validated) {
            // Repor o estoque dos itens antigos
            foreach ($order->stockItems as $item) {
                $item->increment('quantity', $item->pivot->quantity);
            }

            $order->update([
                'client_id'   => $validated['client_id'],
                'user_id'     => $validated['user_id'],
                'description' => $validated['description'] ?? '',
                'status'      => $validated['status'],
            ]);

            $order->stockItems()->detach();

            $items_to_attach = [];

            foreach ($validated['stock_items'] ?? [] as $stock_item_id) {
                $quantity = $validated['quantities'][$stock_item_id] ?? 1;
                $stock = StockItem::findOrFail($stock_item_id);

                if ($stock->quantity < $quantity) {
                    throw new Exception("Estoque insuficiente para o produto: {$stock->name}");
                }

                $items_to_attach[$stock_item_id] = ['quantity' => $quantity];
                $stock->decrement('quantity', $quantity);
            }

            if (!empty($items_to_attach)) {
                $order->stockItems()->attach($items_to_attach);
            }
        });

        return redirect()->route('orders.index')
            ->with('success', 'Ordem de serviço atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $order = OrderService::with('stockItems')->findOrFail($id);

        DB::transaction(function () use ($order) {
            foreach ($order->stockItems as $item) {
                $item->increment('quantity', $item->pivot->quantity);
            }

            $order->stockItems()->detach();
            $order->delete();
        });

        return redirect()->route('orders.index')
            ->with('success', 'Ordem de serviço excluída com sucesso!');
    }
}
