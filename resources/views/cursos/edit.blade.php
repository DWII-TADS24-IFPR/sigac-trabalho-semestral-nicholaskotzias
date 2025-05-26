@extends('layouts.app')

@section('title', 'Editar Curso')

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

<form action="{{ route('cursos.update', $curso->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $curso->nome }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="sigla" class="form-label">Sigla:</label>
            <input type="text" class="form-control" id="sigla" name="sigla" value="{{ $curso->sigla }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="total_horas" class="form-label">Total Horas:</label>
            <input type="integer" class="form-control" id="total_horas" name="total_horas" value="{{ $curso->total_horas }}" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="nivel_id" class="form-label">Nível</label>
        <select name="nivel_id" class="form-select" required>
            @foreach($niveis as $nivel)
                <option value="{{ $nivel->id }}" @selected($nivel->id == $curso->nivel_id)>
                    {{ $nivel->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>
@endsection
