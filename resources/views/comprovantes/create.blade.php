@extends('layouts.app')

@section('title', 'Create Comprovante')

@section('content')

<h1>Criar Comprovante</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<form action="{{ route('comprovantes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="horas" class="form-label">Horas</label>
        <input type="number" class="form-control" id="horas" name="horas" required>
        <label for="atividade" class="form-label">Atividade</label>
        <input type="text" class="form-control" id="atividade" name="atividade" required>
        <div>
            <label for="categoria_id" class="form-label">Categoria</label>
                <select name="categoria_id" class="form-select" required>
                    <option value="">Selecione uma categoria</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
            </select>
        </div>
        <div>
            <label for="aluno_id" class="form-label">Aluno</label>
                <select name="aluno_id" class="form-select" required>
                    <option value="">Selecione um aluno</option>
                        @foreach($alunos as $aluno)
                            <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                        @endforeach
                </select>
        </div>
    </div>

    <a>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="{{ route('comprovantes.index') }}" class="btn btn-primary">Retornar</a>

</form>
@endsection
