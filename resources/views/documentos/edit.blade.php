@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')

<h1>Editar Categoria</h1>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $categoria->nome }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="maximo_horas" class="form-label">Maximo Horas:</label>
            <input type="integer" class="form-control" id="maximo_horas" name="maximo_horas" value="{{ $categoria->maximo_horas }}" required>
        </div>
    </div>
    <div class="mb-3">
        <label for="curso_id" class="form-label">Curso</label>
        <select name="curso_id" class="form-select" required>
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}" @selected($curso->id == $categoria->curso_id)>
                    {{ $curso->nome }}
                </option>
            @endforeach
        </select>
    </div>

     <div class="d-flex justify-content-between">
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>
@endsection
