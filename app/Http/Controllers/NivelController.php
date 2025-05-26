<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;


class NivelController extends Controller
{
    public function index()
    {
        $niveis = Nivel::all();
        return view('niveis.index')->with(['niveis' => $niveis]);
    }

    public function create()
    {
        return view('niveis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:3|unique:niveis,nome'
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.unique' => 'Este nome já está em uso.',
            'nome.min' => 'O nome deve ter pelo menos 3 caracteres.'
        ]);

        $nivel = Nivel::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('niveis.index')->with(['success' => 'Nível ' . $nivel->nome . ' criado com sucesso!']);
    }


    public function show(string $id)
    {
        $nivel = Nivel::findOrFail($id);
        return view('niveis.show')->with(['nivel' => $nivel]);
    }

    public function edit(string $id)
    {
        $nivel = Nivel::findOrFail($id);

        return view('niveis.edit')->with(['nivel' => $nivel]);
    }

    public function update(Request $request, string $id)
    {
        $nivel = Nivel::findOrFail($id);

        if ($request->nome === $nivel->nome) {
            return back()->withErrors(['nome' => 'O nome não foi alterado, tente um nome diferente!'])->withInput();
        }

        $request->validate([
            'nome' => 'required|string|min:3|unique:niveis,nome,' . $nivel->id
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.unique' => 'Este nome já está em uso.',
            'nome.min' => 'O nome deve ter pelo menos 3 caracteres.'
        ]);

        $nivel->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('niveis.index')->with(['success' => 'Nível ' . $nivel->nome . ' atualizado com sucesso!']);
    }


    public function destroy(string $id)
    {

        $nivel = Nivel::findOrFail($id);
        $nivel->delete();

        return redirect()->route('niveis.index')->with(['success' => 'Nível ' . $nivel->nome . ' excluido com sucesso!']);
    }
}
