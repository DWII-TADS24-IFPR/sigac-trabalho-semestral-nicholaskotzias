@extends('layouts.app')

@section('title', 'Create Aluno')

@section('content')

<h1>Criar Aluno</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<form action="{{ route('alunos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
        <label for="cpf" class="form-label">Cpf</label>
        <input type="text" class="form-control" id="cpf" name="cpf" required>
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
        <label for="senha" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" required>
        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" class="form-select" required>
                <option value="">Selecione um curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="turma_id" class="form-label">Turma</label>
                <select name="turma_id" class="form-select" required>
                    <option value="">Selecione uma turma</option>
                        @foreach($turmas as $turma)
                            <option value="{{ $turma->id }}">{{ $turma->ano }}</option>
                        @endforeach
            </select>
        </div>
    </div>

    <a>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="{{ route('categorias.index') }}" class="btn btn-primary">Retornar</a>

</form>
@endsection
