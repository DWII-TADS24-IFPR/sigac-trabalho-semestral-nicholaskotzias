<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();
        return view('documentos.index')->with(['documentos' => $documentos]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('documentos.create')->with('categorias', $categorias);
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|string|min:6',
            'descricao' => 'required|string|min:3|max:255',
            'horas_in' => 'required|min:3',
            'status' => 'required|string|min:5|max:100',
            'horas_out' => 'required',
            'comentario' => 'nullable|string|max:500',
            'categoria_id' => 'required|exists:categorias,id'
        ]);


        $documento = Documento::create([
            'url' => $request->url,
            'descricao' => $request->descricao,
            'horas_in' => $request->horas_in,
            'status' => $request->status,
            'comentario' => $request->comentario,
            'horas_out' => $request->horas_out,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('documentos.index')->with(['success' => 'Documento ' . $documento->url . ' criado com sucesso!']);
    }

    public function show(string $id)
    {
        $documento = Documento::findOrFail($id);
        $categoria = $documento->categoria;
        return view('documentos.show')->with(['documento' => $documento, 'categoria' => $categoria]);
    }

    public function edit(string $id)
    {
        $documento = Documento::findOrFail($id);
        $categorias = Categoria::all();

        return view('documentos.edit')->with(['documento' => $documento, 'categorias' => $categorias]);
    }

    public function update(Request $request, string $id)
    {
        $documento = Documento::findOrFail($id);

        $request->validate([
            'url' => 'required|string|min:6',
            'descricao' => 'required|string|min:3|max:255',
            'horas_in' => 'required|min:3',
            'status' => 'required|string|min:5|max:100',
            'horas_out' => 'required|min:5|max:10',
            'comentario' => 'nullable|string|max:500',
            'categoria_id' => 'required|exists:categorias,id'
        ]);

        $documento->update([
            'url' => $request->url,
            'descricao' => $request->descricao,
            'horas_in' => $request->horas_in,
            'status' => $request->status,
            'comentario' => $request->comentario,
            'horas_out' => $request->horas_out,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('documentos.index')->with(['success' => 'Documento ' . $documento->url . ' atualizado com sucesso!']);
    }

    public function destroy(string $id)
    {
        $documento = Documento::findOrFail($id);
        $documento->delete();

        return redirect()->route('documentos.index')->with(['success' => 'Documento ' . $documento->nome . ' excluido com sucesso!']);
    }
}
