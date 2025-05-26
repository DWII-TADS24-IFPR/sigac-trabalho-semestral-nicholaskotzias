@extends('layouts.app')

@section('title', 'Create Categoria')

@section('content')

<h1>Criar Categoria</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
        <label for="maximo_horas" class="form-label">Maximo Horas</label>
        <input type="integer" class="form-control" id="maximo_horas" name="maximo_horas" required>
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

    <a>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="{{ route('categorias.index') }}" class="btn btn-primary">Retornar</a>

</form>
@endsection
