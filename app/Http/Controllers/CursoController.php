<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Eixo;
use Illuminate\Http\Request;
use App\Models\Nivel;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index')->with(['cursos' => $cursos]);
    }

    public function create()
    {
        $niveis = Nivel::all();
        $eixos = Eixo::all();

        return view('cursos.create')->with([
            'niveis' => $niveis,
            'eixos' => $eixos
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:3|unique:cursos,nome',
            'sigla' => 'required|string|min:3',
            'total_horas' => 'required|integer|min:1|max:10000',
            'nivel_id' => 'required|exists:niveis,id',
            'eixo_id' => 'required|exists:eixos,id'
        ]);


        $Curso = Curso::create([
            'nome' => $request->nome,
            'sigla' => $request->sigla,
            'total_horas' => $request->total_horas,
            'nivel_id' => $request->nivel_id,
            'eixo_id' => $request->eixo_id,
        ]);

        return redirect()->route('cursos.index')->with(['success' => 'Curso ' . $Curso->nome . ' criado com sucesso!']);
    }

    public function show(string $id)
    {
        $curso = Curso::findOrFail($id);
        $nivel = $curso->nivel;
        $eixo = $curso->eixo;
        return view('cursos.show')->with(['curso' => $curso, 'nivel' => $nivel, 'eixo' => $eixo]);
    }

    public function edit(string $id)
    {
        $curso = Curso::findOrFail($id);
        $niveis = Nivel::all();
        $eixos = Eixo::all();

        return view('cursos.edit')->with(['curso' => $curso, 'niveis' => $niveis, 'eixos' => $eixos]);
    }


    public function update(Request $request, string $id)
    {
        $curso = Curso::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|min:3|unique:cursos,nome',
            'sigla' => 'required|string|min:3',
            'total_horas' => 'required|integer|min:1|max:10000',
            'nivel_id' => 'required|exists:niveis,id',
            'eixo_id' => 'required|exists:eixos,id'
        ]);

        $curso->update([
            'nome' => $request->nome,
            'sigla' => $request->sigla,
            'total_horas' => $request->total_horas,
            'nivel_id' => $request->nivel_id,
            'eixo_id' => $request->eixo_id,
        ]);

        return redirect()->route('cursos.index')->with(['success' => 'Curso ' . $curso->nome . ' atualizado com sucesso!']);
    }

    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')->with(['success' => 'Curso ' . $curso->nome . ' excluido com sucesso!']);
    }
}
