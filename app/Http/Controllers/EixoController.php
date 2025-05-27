<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    public function index()
    {
        $eixos = Eixo::all();
        return view('eixos.index')->with(['eixos' => $eixos]);
    }

    public function create()
    {
        return view('eixos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:3|unique:eixos,nome'
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.unique' => 'Este nome já está em uso.',
            'nome.min' => 'O nome deve ter pelo menos 3 caracteres.'
        ]);

        $eixo = Eixo::create([
            'nome' => $request->nome,
        ]);

        return redirect()->route('eixos.index')->with(['success' => 'Eixo ' . $eixo->nome . ' criado com sucesso!']);
    }

    public function show(string $id)
    {
        $eixo = Eixo::findOrFail($id);
        return view('eixos.show')->with(['eixo' => $eixo]);
    }

    public function edit(string $id)
    {
        $eixo = Eixo::findOrFail($id);

        return view('eixos.edit')->with(['eixo' => $eixo]);
    }

    public function update(Request $request, string $id)
    {
        $eixo = Eixo::findOrFail($id);

        if ($request->nome === $eixo->nome) {
            return back()->withErrors(['nome' => 'O nome não foi alterado, tente um nome diferente!'])->withInput();
        }

        $request->validate([
            'nome' => 'required|string|min:3|unique:eixos,nome,' . $eixo->id
        ], [
            'nome.required' => 'O nome é obrigatório.',
            'nome.unique' => 'Este nome já está em uso.',
            'nome.min' => 'O nome deve ter pelo menos 3 caracteres.'
        ]);

        $eixo->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('eixos.index')->with(['success' => 'Eixo ' . $eixo->nome . ' atualizado com sucesso!']);
    }

    public function destroy(string $id)
    {
        $eixo = Eixo::findOrFail($id);
        $eixo->delete();

        return redirect()->route('eixos.index')->with(['success' => 'Eixo ' . $eixo->nome . ' excluido com sucesso!']);
    }
}
