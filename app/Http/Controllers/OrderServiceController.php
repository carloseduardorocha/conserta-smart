<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = collect([
            (object)[
                'id' => 1,
                'nome' => 'Carlos Rocha', // Nome do cliente
                'sku' => '01',
                'marca' => 'Dell',
                'modelo' => 'Inspiron 15',
                'orcamento_previo' => 350.00
            ],
            (object)[
                'id' => 2,
                'nome' => 'Ana Silva', // Nome do cliente
                'sku' => '02',
                'marca' => 'Samsung',
                'modelo' => 'Galaxy S20',
                'orcamento_previo' => 500.00
            ],
            (object)[
                'id' => 3,
                'nome' => 'João Souza', // Nome do cliente
                'sku' => '03',
                'marca' => 'HP',
                'modelo' => 'Pavilion',
                'orcamento_previo' => 120.00
            ],
        ]);

        $page         = request()->get('page', 1);
        $perPage      = 10;
        $total        = $items->count();
        $currentItems = $items->slice(($page - 1) * $perPage, $perPage)->values();

        $orderservices = new LengthAwarePaginator(
            $currentItems,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('order.index', compact('orderservices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order.edit', ['orderservice' => null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Aqui você faria a validação e salvaria no banco de dados
        return redirect()->route('orders.index')
            ->with('success', 'Ordem de serviço criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = collect([
            (object)[
                'id' => 1,
                'nome' => 'Carlos Rocha',
                'sku' => '01',
                'marca' => 'Dell',
                'modelo' => 'Inspiron 15',
                'orcamento_previo' => 350.00
            ],
            (object)[
                'id' => 2,
                'nome' => 'Ana Silva',
                'sku' => '02',
                'marca' => 'Samsung',
                'modelo' => 'Galaxy S20',
                'orcamento_previo' => 500.00
            ],
            (object)[
                'id' => 3,
                'nome' => 'João Souza',
                'sku' => '03',
                'marca' => 'HP',
                'modelo' => 'Pavilion',
                'orcamento_previo' => 120.00
            ],
        ]);

        $orderservice = $items->firstWhere('id', (int) $id);

        if (!$orderservice) {
            abort(404, 'Ordem de serviço não encontrada.');
        }

        return view('order.show', compact('orderservice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = collect([
            (object)[
                'id' => 1,
                'nome' => 'Carlos Rocha',
                'sku' => '01',
                'marca' => 'Dell',
                'modelo' => 'Inspiron 15',
                'orcamento_previo' => 350.00
            ],
            (object)[
                'id' => 2,
                'nome' => 'Ana Silva',
                'sku' => '02',
                'marca' => 'Samsung',
                'modelo' => 'Galaxy S20',
                'orcamento_previo' => 500.00
            ],
            (object)[
                'id' => 3,
                'nome' => 'João Souza',
                'sku' => '03',
                'marca' => 'HP',
                'modelo' => 'Pavilion',
                'orcamento_previo' => 120.00
            ],
        ]);

        $orderservice = $items->firstWhere('id', (int) $id);

        if (!$orderservice) {
            abort(404, 'Ordem de serviço não encontrada.');
        }

        return view('order.edit', compact('orderservice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Aqui você faria a validação e atualização no banco de dados
        return redirect()->route('orders.index')
            ->with('success', 'Ordem de serviço atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Aqui você faria a exclusão no banco de dados
        return redirect()->route('orders.index')
            ->with('success', 'Ordem de serviço excluída com sucesso!');
    }
}