<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Curso;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index')->with(['categorias' => $categorias]);
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('categorias.create')->with('cursos', $cursos);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|min:3|unique:categorias,nome',
            'maximo_horas' => 'required|integer|min:1|max:10000',
            'curso_id' => 'required|exists:cursos,id'
        ]);


        $categoria = Categoria::create([
            'nome' => $request->nome,
            'maximo_horas' => $request->maximo_horas,
            'curso_id' => $request->curso_id,
        ]);

        return redirect()->route('categorias.index')->with(['success' => 'Categoria ' . $categoria->nome . ' criado com sucesso!']);
    }

    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $curso = $categoria->curso;
        return view('categorias.show')->with(['categoria' => $categoria, 'curso' => $curso]);
    }

    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $cursos = Curso::all();

        return view('categorias.edit')->with(['categoria' => $categoria, 'cursos' => $cursos]);
    }

    public function update(Request $request, string $id)
    {
        $categoria = Categoria::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|min:3|unique:categorias,nome',
            'maximo_horas' => 'required|integer|min:1|max:10000',
            'curso_id' => 'required|exists:cursos,id'
        ]);

        $categoria->update([
            'nome' => $request->nome,
            'maximo_horas' => $request->maximo_horas,
            'curso_id' => $request->curso_id,
        ]);

        return redirect()->route('categorias.index')->with(['success' => 'Categoria ' . $categoria->nome . ' atualizada com sucesso!']);
    }

    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with(['success' => 'Categoria ' . $categoria->nome . ' excluido com sucesso!']);
    }
}
