@extends('layouts.app')

@section('title', 'Editar Turma')

@section('content')

<h1>Editar Curso</h1>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('turmas.update', $turma->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="ano" class="form-label">Ano:</label>
            <input type="integer" class="form-control" id="ano" name="ano" value="{{ $turma->ano }}" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="curso_id" class="form-label">Curso</label>
        <select name="curso_id" class="form-select" required>
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}" @selected($curso->id == $turma->curso_id)>
                    {{ $curso->nome }}
                </option>
            @endforeach
        </select>
    </div>

     <div class="d-flex justify-content-between">
        <a href="{{ route('turmas.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>

@endsection
