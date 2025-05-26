@extends('layouts.app')

@section('title', 'Editar Nível')

@section('content')

<h1>Editar Nivel</h1>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<form action="{{ route('niveis.update', $nivel->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $nivel->nome }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('niveis.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </div>
</form>
@endsection
