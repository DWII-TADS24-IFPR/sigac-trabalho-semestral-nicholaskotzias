<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Declaração</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; line-height: 1.5; }
        .center { text-align: center; }
    </style>
</head>
<body>

    <h2 class="center">Declaração de Conclusão</h2>

    <p>Declaramos que o(a) aluno(a) <strong>{{ $aluno->nome }}</strong> está matriculado(a) no curso de <strong>{{ $aluno->curso->nome }}</strong>.</p>

    <p>Total de horas cumpridas: <strong>{{ $horasTotal }}</strong> horas.</p>

    @if($cursoConcluido)
        <p><strong>O curso foi concluído com sucesso.</strong></p>
    @else
        <p><strong>O curso ainda não foi concluído.</strong></p>
    @endif

    <p>Emitido em: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>

</body>
</html>
