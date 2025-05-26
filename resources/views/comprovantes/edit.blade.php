@extends('layouts.app')

@section('title', 'Editar Comprovante')

@section('content')

<h1>Editar Comprovante</h1>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('comprovantes.update', $comprovante->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="row mb-3">
        <div class="col-md-12">
            <label for="horas" class="form-label">Horas:</label>
            <input type="number" class="form-control" id="horas" name="horas" value="{{ old('horas', $comprovante->horas) }}" required>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <label for="atividade" class="form-label">Atividade:</label>
            <input type="text" class="form-control" id="atividade" name="atividade" value="{{ old('atividade', $comprovante->atividade) }}" required>
        </div>
    </div>
    <div>
        <label for="categoria_id" class="form-label">Categoria</label>
        <select name="categoria_id" class="form-select" required>
            <option value="">Selecione uma categoria</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $comprovante->categoria_id == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mt-3">
        <label for="aluno_id" class="form-label">Aluno</label>
        <select name="aluno_id" class="form-select" required>
            <option value="">Selecione um aluno</option>
            @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}" {{ $comprovante->aluno_id == $aluno->id ? 'selected' : '' }}>
                    {{ $aluno->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="d-flex justify-content-between mt-4">
        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </div>
</form>
@endsection
