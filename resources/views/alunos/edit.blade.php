@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')

<h1>Editar Aluno</h1>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('alunos.update', $aluno->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $aluno->nome }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="cpf" class="form-label">Cpf:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $aluno->cpf }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $aluno->email }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" value="{{ $aluno->senha }}" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="curso_id" class="form-label">Curso</label>
        <select name="curso_id" class="form-select" required>
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}" @selected($curso->id == $aluno->curso_id)>
                    {{ $curso->nome }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
    <label for="turma_id" class="form-label">Turma</label>
    <select name="turma_id" class="form-select" required>
            @foreach($turmas as $turma)
                <option value="{{ $turma->id }}" @selected($turma->id == $aluno->turma_id)>
                    {{ $turma->ano }}
                </option>
            @endforeach
        </select>
    </div>
     <div class="d-flex justify-content-between">
        <a href="{{ route('alunos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>
@endsection
