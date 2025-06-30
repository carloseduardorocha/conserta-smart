<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('client.index', compact('clients'));
    }

    public function create()
    {
        return view('client.edit', ['client' => null]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'cpf'   => 'required|string|max:20|unique:clients,cpf,' . ($client->id ?? 'null'),
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $validated['cpf'] = preg_replace('/\D/', '', $validated['cpf']);
        $validated['phone'] = preg_replace('/\D/', '', $validated['phone'] ?? '');

        if (!str_starts_with($validated['phone'], '55') && $validated['phone'] !== '') {
            $validated['phone'] = '+55' . $validated['phone'];
        } elseif ($validated['phone'] !== '') {
            $validated['phone'] = '+' . $validated['phone'];
        }

        Client::create($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Cliente criado com sucesso!');
    }

    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return view('client.show', compact('client'));
    }

    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('client.edit', compact('client'));
    }

    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'cpf'   => 'required|string|max:20|unique:clients,cpf,' . ($client->id ?? 'null'),
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $validated['cpf'] = preg_replace('/\D/', '', $validated['cpf']);
        $validated['phone'] = preg_replace('/\D/', '', $validated['phone'] ?? '');

        if (!str_starts_with($validated['phone'], '55') && $validated['phone'] !== '') {
            $validated['phone'] = '+55' . $validated['phone'];
        } elseif ($validated['phone'] !== '') {
            $validated['phone'] = '+' . $validated['phone'];
        }

        $client->update($validated);

        return redirect()->route('clients.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Cliente excluído com sucesso!');
    }
}
