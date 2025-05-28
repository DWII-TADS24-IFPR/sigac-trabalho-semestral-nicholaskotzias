<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class AdminController extends Controller
{
    public function documentos()
    {
        $documentos = Documento::where('status', 'analise')->get();
        return view('admin.documentos', compact('documentos'));
    }

    public function aprovarDocumento($id)
    {
        $documento = Documento::findOrFail($id);
        $documento->status = 'aprovado';
        $documento->save();

        return redirect()->back()->with('success', 'Documento aprovado com sucesso!');
    }

    public function rejeitarDocumento($id)
    {
        $documento = Documento::findOrFail($id);
        $documento->status = 'rejeitado';
        $documento->save();

        return redirect()->back()->with('success', 'Documento rejeitado com sucesso!');
    }
}
