@extends('layouts.app')

@section('title', 'Create Curso')

@section('content')

<h1>Criar Curso</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<form action="{{ route('cursos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
        <label for="sigla" class="form-label">Sigla</label>
        <input type="text" class="form-control" id="sigla" name="sigla" required>
        <label for="total_horas" class="form-label">Total Horas</label>
        <input type="integer" class="form-control" id="total_horas" name="total_horas" required>
        <div class="mb-3">
            <label for="nivel_id" class="form-label">Nivel</label>
            <select name="nivel_id" class="form-select" required>
                <option value="">Selecione um nível</option>
                @foreach($niveis as $nivel)
                    <option value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <a>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="{{ route('cursos.index') }}" class="btn btn-primary">Retornar</a>

</form>
@endsection
