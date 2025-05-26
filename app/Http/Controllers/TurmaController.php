<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        return view('turmas.index')->with(['turmas' => $turmas]);
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('turmas.create')->with('cursos', $cursos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ano' => 'required|integer|min:2000',
            'curso_id' => 'required|exists:cursos,id'
        ]);


        $turma = Turma::create([
            'ano' => $request->ano,
            'curso_id' => $request->curso_id,
        ]);

        return redirect()->route('turmas.index')->with(['success' => 'Turma ' . $turma->ano . ' criado com sucesso!']);
    }

    public function show(string $id)
    {
        $turma = Turma::findOrFail($id);
        $curso = $turma->curso;
        return view('turmas.show')->with(['turma' => $turma, 'curso' => $curso]);
    }

    public function edit(string $id)
    {
        $turma = Turma::findOrFail($id);
        $cursos = Curso::all();

        return view('turmas.edit')->with(['turma' => $turma, 'cursos' => $cursos]);
    }

    public function update(Request $request, string $id)
    {
        $turma = Turma::findOrFail($id);

        $request->validate([
            'ano' => 'required|integer|min:2000',
            'curso_id' => 'required|exists:cursos,id'
        ]);

        $turma->update([
            'ano' => $request->ano,
            'curso_id' => $request->curso_id,
        ]);

        return redirect()->route('turmas.index')->with(['success' => 'Turma ' . $turma->ano . ' atualizado com sucesso!']);
    }

    public function destroy(string $id)
    {
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('turmas.index')->with(['success' => 'Turma ' . $turma->ano . ' excluida com sucesso!']);
    }
}
