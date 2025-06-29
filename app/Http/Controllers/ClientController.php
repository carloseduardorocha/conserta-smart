<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     * localhost:8000/clients
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

        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     * localhost:8000/clients/create (GET)
     */
    public function create()
    {
        return view('client.edit', ['client' => null]);
    }

    /**
     * Store a newly created resource in storage.
     * localhost:8000/clients (POST)
     */
    public function store(Request $request)
    {
        return redirect()->route('clients.index')
            ->with('success', 'Cliente criado com sucesso!');
    }

    /**
     * Display the specified resource.
     * localhost:8000/clients/1 (GET)
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

        return view('client.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     * localhost:8000/clients/1/edit (GET)
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

        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     * localhost:8000/clients/1/edit (PUT)
     */
    public function update(Request $request, string $id)
    {
        return redirect()->route('clients.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     * localhost:8000/clients/1 (DELETE)
     */
    public function destroy(string $id)
    {
        return redirect()->route('clients.index')
            ->with('success', 'Cliente excluido com sucesso!');
    }
}
