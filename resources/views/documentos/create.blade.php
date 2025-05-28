@extends('layouts.app')

@section('title', 'Create Documento')

@section('content')

<h1>Criar Documento</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('documentos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="url" class="form-label">Arquivo</label>
        <input type="file" class="form-control" id="url" name="url" required>

        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" class="form-control" id="descricao" name="descricao" required>

        <label for="horas_in" class="form-label">Horas In</label>
        <input type="number" step="0.01" class="form-control" id="horas_in" name="horas_in" required>

        <label for="status" class="form-label">Status</label>
        <input type="text" class="form-control" id="status" name="status" value="analise" readonly required>

        <label for="comentario" class="form-label">Comentario</label>
        <input type="text" class="form-control" id="comentario" name="comentario">

        <label for="horas_out" class="form-label">Horas Out</label>
        <input type="number" step="0.01" class="form-control" id="horas_out" name="horas_out" required>

        <label for="categoria_id" class="form-label">Categoria</label>
        <select name="categoria_id" class="form-select" required>
            <option value="">Selecione uma categoria</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Retornar</a>
</form>

@endsection
