<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Categoria;
use App\Models\Comprovante;
use Illuminate\Http\Request;

class ComprovanteController extends Controller
{
    public function index()
    {
        $comprovantes = Comprovante::all();
        return view('comprovantes.index')->with(['comprovantes' => $comprovantes]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        $alunos = Aluno::all();
        return view('comprovantes.create')->with(['categorias' => $categorias, 'alunos' => $alunos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'horas' => 'required|integer|min:0.1|max:100',
            'atividade' => 'required|string|min:3|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'aluno_id' => 'required|exists:alunos,id'
        ]);

        Comprovante::create([
            'horas' => $request->horas,
            'atividade' => $request->atividade,
            'categoria_id' => $request->categoria_id,
            'aluno_id' => $request->aluno_id,
        ]);

        return redirect()->route('comprovantes.index')->with(['success' => 'Comprovante criado com sucesso!']);
    }

    public function show(string $id)
    {
        $comprovante = Comprovante::findOrFail($id);
        $categoria = $comprovante->categoria;
        $aluno = $comprovante->aluno;

        return view('comprovantes.show')->with(['comprovante' => $comprovante, 'categoria' => $categoria, 'aluno' => $aluno]);
    }

    public function edit(string $id)
    {
        $comprovante = Comprovante::findOrFail($id);
        $categorias = Categoria::all();
        $alunos = Aluno::all();

        return view('comprovantes.edit')->with([
            'comprovante' => $comprovante,
            'categorias' => $categorias,
            'alunos' => $alunos
        ]);
    }

    public function update(Request $request, string $id)
    {
        $comprovante = Comprovante::findOrFail($id);

        $request->validate([
            'horas' => 'required|numeric|min:0.1|max:100',
            'atividade' => 'required|string|min:3|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'aluno_id' => 'required|exists:alunos,id'
        ]);

        $comprovante->update([
            'horas' => $request->horas,
            'atividade' => $request->atividade,
            'categoria_id' => $request->categoria_id,
            'aluno_id' => $request->aluno_id,
        ]);

        return redirect()->route('comprovantes.index')->with(['success' => 'Comprovante atualizado com sucesso!']);
    }

    public function destroy(string $id)
    {
        $comprovante = Comprovante::findOrFail($id);
        $comprovante->delete();

        return redirect()->route('comprovantes.index')->with(['success' => 'Comprovante excluído com sucesso!']);
    }
}
