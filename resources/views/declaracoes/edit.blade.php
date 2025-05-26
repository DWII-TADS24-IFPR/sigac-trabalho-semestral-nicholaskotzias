@extends('layouts.app')

@section('title', 'Editar Declaração')

@section('content')

<h1>Editar Declaração</h1>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('declaracoes.update', $declaracao->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="hash" class="form-label">Hash:</label>
        <input type="text" class="form-control" id="hash" name="hash" value="{{ $declaracao->hash }}" required>
    </div>

    <div class="mb-3">
        <label for="data" class="form-label">Data:</label>
        <input type="date" class="form-control" id="data" name="data" value="{{ $declaracao->data }}" required>
    </div>

    <div class="mb-3">
        <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" class="form-select" required>
                <option value="">Selecione um aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ $declaracao->aluno_id == $aluno->id ? 'selected' : '' }}>{{ $aluno->nome }}</option>
                @endforeach
            </select>
    </div>

    <div class="mb-3">
        <label for="comprovante_id" class="form-label">Comprovante</label>
            <select name="comprovante_id" class="form-select" required>
                <option value="">Selecione um Comprovante</option>
                    @foreach($comprovantes as $comprovante)
                        <option value="{{ $comprovante->id }}" {{ $declaracao->comprovante_id == $comprovante->id ? 'selected' : '' }}>{{ $comprovante->atividade }}</option>
                    @endforeach
            </select>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>
@endsection
