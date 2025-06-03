<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class GerarDeclaracaoController extends Controller
{
    public function emitirDeclaracao()
    {
        $user = Auth::user();

        if (!$user || !$user->aluno || !$user->aluno->curso) {
            return redirect()->back()->with('error', 'Dados do aluno ou curso incompletos.');
        }

        $documentos = Documento::where('user_id', $user->id)->where('status', 'aprovado')->get();

        $horasTotal = $documentos->sum('horas_out');
        $totalHorasCurso = $user->aluno->curso->total_horas;
        $cursoConcluido = $horasTotal >= $totalHorasCurso;

        $html = View::make('pdf.declaracao', [
            'aluno' => $user->aluno,
            'cursoConcluido' => $cursoConcluido,
            'horasTotal' => $horasTotal
        ])->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('declaracao_'.$user->aluno->nome.'.pdf');
    }
}
