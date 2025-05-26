@extends('layouts.app')

@section('title', 'Create Turma')

@section('content')

<h1>CRIAR CURSO</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<form action="{{ route('turmas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="ano" class="form-label">Ano</label>
        <input type="number" class="form-control" id="ano" name="ano" required>
        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" class="form-select" required>
                <option value="">Selecione um curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="{{ route('turmas.index') }}" class="btn btn-primary">Retornar</a>
</form>
@endsection
