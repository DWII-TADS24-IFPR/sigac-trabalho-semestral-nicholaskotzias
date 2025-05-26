<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index')->with(['alunos' => $alunos]);
    }

    public function create()
    {
        $cursos = Curso::all();
        $turmas = Turma::all();
        return view('alunos.create')->with(['cursos' => $cursos, 'turmas' => $turmas]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:3|max:255',
            'cpf' => 'required|string|min:11',
            'email' => 'required|string|min:5',
            'senha' => 'required|string|min:8',
            'curso_id' => 'required|exists:cursos,id',
            'turma_id' => 'required|exists:turmas,id'
        ]);

        $aluno = Aluno::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'senha' => $request->senha,
            'curso_id' => $request->curso_id,
            'turma_id' => $request->turma_id,
        ]);

        return redirect()->route('alunos.index')->with(['success' => 'Aluno ' . $aluno->nome . ' criado com sucesso!']);
    }

    public function show(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $curso = $aluno->curso;
        $turma = $aluno->turma;

        return view('alunos.show')->with(['aluno' => $aluno, 'curso' => $curso, 'turma' => $turma]);
    }

    public function edit(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $cursos = Curso::all();
        $turmas = Turma::all();

        return view('alunos.edit')->with(['aluno' => $aluno, 'cursos' => $cursos, 'turmas' => $turmas]);
    }

    public function update(Request $request, string $id)
    {
        $aluno = Aluno::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|min:3|max:255',
            'cpf' => 'required|string|min:11',
            'email' => 'required|string|min:5',
            'senha' => 'required|string|min:8',
            'curso_id' => 'required|exists:cursos,id',
            'turma_id' => 'required|exists:turmas,id'
        ]);

        $aluno->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'senha' => $request->senha,
            'curso_id' => $request->curso_id,
            'turma_id' => $request->turma_id,
        ]);

        return redirect()->route('alunos.index')->with(['success' => 'Aluno ' . $aluno->nome . ' atualizada com sucesso!']);
    }

    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return redirect()->route('alunos.index')->with(['success' => 'Aluno ' . $aluno->nome . ' excluido com sucesso!']);
    }
}
