<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Comprovante;
use App\Models\Declaracao;
use Illuminate\Http\Request;

class DeclaracaoController extends Controller
{
    public function index()
    {
        $declaracoes = Declaracao::all();
        return view('declaracoes.index')->with(['declaracoes' => $declaracoes]);
    }

    public function create()
    {
        $alunos = Aluno::all();
        $comprovantes = Comprovante::all();
        return view('declaracoes.create')->with(['alunos' => $alunos, 'comprovantes' => $comprovantes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'hash' => 'required|string|unique:declaracoes,hash',
            'data' => 'required|date',
            'aluno_id' => 'required|exists:alunos,id',
            'comprovante_id' => 'required|exists:comprovantes,id'
        ]);

        Declaracao::create([
            'hash' => $request->hash,
            'data' => $request->data,
            'aluno_id' => $request->aluno_id,
            'comprovante_id' => $request->comprovante_id,
        ]);

        return redirect()->route('declaracoes.index')->with(['success' => 'Declaracao criada com sucesso!']);
    }

    public function show(string $id)
    {
        $declaracao = Declaracao::findOrFail($id);
        $aluno = $declaracao->aluno;
        $comprovante = $declaracao->comprovante;

        return view('declaracoes.show')->with(['declaracao' => $declaracao, 'aluno' => $aluno, 'comprovante' => $comprovante]);
    }

    public function edit(string $id)
    {
        $declaracao = Declaracao::findOrFail($id);
        $alunos = Aluno::all();
        $comprovantes = Comprovante::all();

        return view('declaracoes.edit')->with(['declaracao' => $declaracao, 'alunos' => $alunos, 'comprovantes' => $comprovantes]);
    }

    public function update(Request $request, string $id)
    {
        $declaracao = Declaracao::findOrFail($id);

        $request->validate([
            'hash' => 'required|string|unique:declaracoes,hash',
            'data' => 'required|date',
            'aluno_id' => 'required|exists:alunos,id',
            'comprovante_id' => 'required|exists:comprovantes,id'
        ]);

        $declaracao->update([
            'hash' => $request->hash,
            'data' => $request->data,
            'aluno_id' => $request->aluno_id,
            'comprovante_id' => $request->comprovante_id,
        ]);

        return redirect()->route('declaracoes.index')->with(['success' => 'Declaracao atualizada com sucesso!']);
    }

    public function destroy(string $id)
    {
        $declaracao = Declaracao::findOrFail($id);
        $declaracao->delete();

        return redirect()->route('declaracoes.index')->with(['success' => 'Declaracao excluida com sucesso!']);
    }
}
