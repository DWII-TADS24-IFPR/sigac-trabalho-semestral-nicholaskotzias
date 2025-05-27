@extends('layouts.app')

@section('title', 'Editar Eixo')

@section('content')

<h1>Editar Eixo</h1>

@if ($errors->any())
    <div class="alert alert-danger mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<form action="{{ route('eixos.update', $eixo->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="container mt-4">
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $eixo->nome }}" required>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('eixos.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>
    </div>
</form>
@endsection
