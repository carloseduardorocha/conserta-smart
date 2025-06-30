<?php

namespace App\Http\Controllers;

use App\Models\StockItem;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $items = StockItem::latest()->paginate(10);
        return view('stock.index', compact('items'));
    }

    public function create()
    {
        return view('stock.edit', ['item' => null]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand'          => 'required|string|max:100',
            'model'          => 'required|string|max:100',
            'name'           => 'required|string|max:255',
            'type'           => 'required|string|max:100',
            'quantity'       => 'required|integer|min:0',
            'purchase_price' => 'required|string',
            'sale_price'     => 'required|string',
            'supplier'       => 'required|string|max:255',
        ]);

        $validated['purchase_price'] = floatval(str_replace(',', '.', $validated['purchase_price']));
        $validated['sale_price']     = floatval(str_replace(',', '.', $validated['sale_price']));
        
        StockItem::create($validated);

        return redirect()->route('stock.index')
            ->with('success', 'Item de estoque criado com sucesso!');
    }

    public function show(string $id)
    {
        $item = StockItem::findOrFail($id);
        return view('stock.show', compact('item'));
    }

    public function edit(string $id)
    {
        $item = StockItem::findOrFail($id);
        return view('stock.edit', compact('item'));
    }

    public function update(Request $request, string $id)
    {
        $item = StockItem::findOrFail($id);

        $validated = $request->validate([
            'brand'          => 'required|string|max:100',
            'model'          => 'required|string|max:100',
            'name'           => 'required|string|max:255',
            'type'           => 'required|string|max:100',
            'quantity'       => 'required|integer|min:0',
            'purchase_price' => 'required|string',
            'sale_price'     => 'required|string',
            'supplier'       => 'required|string|max:255',
        ]);

        $validated['purchase_price'] = floatval(str_replace(',', '.', $validated['purchase_price']));
        $validated['sale_price']     = floatval(str_replace(',', '.', $validated['sale_price']));

        $item->update($validated);

        return redirect()->route('stock.index')
            ->with('success', 'Item de estoque atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $item = StockItem::findOrFail($id);
        $item->delete();

        return redirect()->route('stock.index')
            ->with('success', 'Item de estoque excluído com sucesso!');
    }
}
