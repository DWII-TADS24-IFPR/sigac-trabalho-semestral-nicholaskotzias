@extends('layouts.app')

@section('title', 'Create Declaração')

@section('content')

<h1>Criar Declaração</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<form action="{{ route('declaracoes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="hash" class="form-label">Hash</label>
        <input type="string" class="form-control" id="hash" name="hash" required>
        <label for="data" class="form-label">Data</label>
        <input type="date" class="form-control" id="data" name="data" required>
        <div>
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" class="form-select" required>
                <option value="">Selecione um aluno</option>
                @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div>
        <label for="comprovante_id" class="form-label">Comprovante</label>
            <select name="comprovante_id" class="form-select" required>
                <option value="">Selecione um comprovante</option>
                    @foreach($comprovantes as $comprovante)
                        <option value="{{ $comprovante->id }}">{{ $comprovante->atividade }}</option>
                    @endforeach
        </select>
    </div>

    <a>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="{{ route('categorias.index') }}" class="btn btn-primary">Retornar</a>

</form>
@endsection
