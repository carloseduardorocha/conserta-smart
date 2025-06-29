<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = collect([
            (object)['id' => 1, 'name' => 'Carlos Rocha', 'email' => 'carlos@example.com', 'phone' => '123456789', 'cpf' => '03749824061'],
            (object)['id' => 2, 'name' => 'Ana Silva', 'email' => 'ana@example.com', 'phone' => '987654321', 'cpf' => '03749824061'],
            (object)['id' => 3, 'name' => 'João Souza', 'email' => 'joao@example.com', 'phone' => '456789123', 'cpf' => '03749824061'],
        ]);

        $page         = request()->get('page', 1);
        $perPage      = 10;
        $total        = $items->count();
        $currentItems = $items->slice(($page - 1) * $perPage, $perPage)->values();

        $clients = new LengthAwarePaginator(
            $currentItems,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('order.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.edit', ['client' => null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('orders.index')
            ->with('success', 'Cliente criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = collect([
            (object)['id' => 1, 'name' => 'Carlos Rocha', 'email' => 'carlos@example.com', 'phone' => '123456789', 'cpf' => '03749824061'],
            (object)['id' => 2, 'name' => 'Ana Silva', 'email' => 'ana@example.com', 'phone' => '987654321', 'cpf' => '03749824061'],
            (object)['id' => 3, 'name' => 'João Souza', 'email' => 'joao@example.com', 'phone' => '456789123', 'cpf' => '03749824061'],
        ]);

        $client = $items->firstWhere('id', (int) $id);

        if (!$client) {
            abort(404, 'Cliente não encontrado.');
        }

        return view('order.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = collect([
            (object)['id' => 1, 'name' => 'Carlos Rocha', 'email' => 'carlos@example.com', 'phone' => '123456789', 'cpf' => '03749824061'],
            (object)['id' => 2, 'name' => 'Ana Silva', 'email' => 'ana@example.com', 'phone' => '987654321', 'cpf' => '03749824061'],
            (object)['id' => 3, 'name' => 'João Souza', 'email' => 'joao@example.com', 'phone' => '456789123', 'cpf' => '03749824061'],
        ]);

        $client = $items->firstWhere('id', (int) $id);

        if (!$client) {
            abort(404, 'Cliente não encontrado.');
        }

        return view('order.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('orders.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->route('orders.index')
            ->with('success', 'Cliente excluido com sucesso!');
    }
}
