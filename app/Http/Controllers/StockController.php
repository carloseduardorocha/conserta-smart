<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = collect([
            (object)[
                'id' => 1,
                'sku' => 'P001',
                'marca' => 'Samsung',
                'modelo' => 'Galaxy S20',
                'tipo' => 'Display',
                'quantidade' => 5,
                'preco' => 350.00,
                'fornecedor' => 'Fornecedor A'
            ],
            (object)[
                'id' => 2,
                'sku' => 'P002',
                'marca' => 'Dell',
                'modelo' => 'Inspiron 15',
                'tipo' => 'Teclado',
                'quantidade' => 10,
                'preco' => 120.00,
                'fornecedor' => 'Fornecedor B'
            ],
            (object)[
                'id' => 3,
                'sku' => 'P003',
                'marca' => 'HP',
                'modelo' => 'Pavilion',
                'tipo' => 'Fonte',
                'quantidade' => 3,
                'preco' => 200.00,
                'fornecedor' => 'Fornecedor C'
            ],
        ]);

        $page         = request()->get('page', 1);
        $perPage      = 10;
        $total        = $items->count();
        $currentItems = $items->slice(($page - 1) * $perPage, $perPage)->values();

        $stocks = new LengthAwarePaginator(
            $currentItems,
            $total,
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stock.edit', ['stock' => null]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Aqui você faria a validação e salvaria no banco de dados
        return redirect()->route('stock.index')
            ->with('success', 'Peça cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = collect([
            (object)[
                'id' => 1,
                'sku' => 'P001',
                'marca' => 'Samsung',
                'modelo' => 'Galaxy S20',
                'tipo' => 'Display',
                'quantidade' => 5,
                'preco' => 350.00,
                'fornecedor' => 'Fornecedor A'
            ],
            (object)[
                'id' => 2,
                'sku' => 'P002',
                'marca' => 'Dell',
                'modelo' => 'Inspiron 15',
                'tipo' => 'Teclado',
                'quantidade' => 10,
                'preco' => 120.00,
                'fornecedor' => 'Fornecedor B'
            ],
            (object)[
                'id' => 3,
                'sku' => 'P003',
                'marca' => 'HP',
                'modelo' => 'Pavilion',
                'tipo' => 'Fonte',
                'quantidade' => 3,
                'preco' => 200.00,
                'fornecedor' => 'Fornecedor C'
            ],
        ]);

        $stock = $items->firstWhere('id', (int) $id);

        if (!$stock) {
            abort(404, 'Peça não encontrada.');
        }

        return view('stock.show', compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = collect([
            (object)[
                'id' => 1,
                'sku' => 'P001',
                'marca' => 'Samsung',
                'modelo' => 'Galaxy S20',
                'tipo' => 'Display',
                'quantidade' => 5,
                'preco' => 350.00,
                'fornecedor' => 'Fornecedor A'
            ],
            (object)[
                'id' => 2,
                'sku' => 'P002',
                'marca' => 'Dell',
                'modelo' => 'Inspiron 15',
                'tipo' => 'Teclado',
                'quantidade' => 10,
                'preco' => 120.00,
                'fornecedor' => 'Fornecedor B'
            ],
            (object)[
                'id' => 3,
                'sku' => 'P003',
                'marca' => 'HP',
                'modelo' => 'Pavilion',
                'tipo' => 'Fonte',
                'quantidade' => 3,
                'preco' => 200.00,
                'fornecedor' => 'Fornecedor C'
            ],
        ]);

        $stock = $items->firstWhere('id', (int) $id);

        if (!$stock) {
            abort(404, 'Peça não encontrada.');
        }

        return view('stock.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Aqui você faria a validação e atualização no banco de dados
        return redirect()->route('stock.index')
            ->with('success', 'Peça atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Aqui você faria a exclusão no banco de dados
        return redirect()->route('stock.index')
            ->with('success', 'Peça excluída com sucesso!');
    }
}