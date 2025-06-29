<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.index', compact('users'));
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        if (auth()->id() == $user->id) {
            return redirect()->route('admin.index')
                ->with('error', 'Você não pode editar a si mesmo.');
        }

        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        if (auth()->id() == $user->id) {
            return redirect()->route('admin.index')
                ->with('error', 'Você não pode editar a si mesmo.');
        }

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'type'  => 'required|in:admin,employee',
        ]);

        $user->update($validated);

        return redirect()->route('admin.index')
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if (auth()->id() == $user->id) {
            return redirect()->route('admin.index')
                ->with('error', 'Você não pode excluir a si mesmo.');
        }

        $user->delete();

        return redirect()->route('admin.index')
            ->with('success', 'Usuário excluído com sucesso!');
    }
}
