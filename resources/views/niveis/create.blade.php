@extends('layouts.app')

@section('title', 'Create Nível')

@section('content')

<h1>Criar Nivel</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<form action="{{ route('niveis.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome" required>
    </div>

    <a>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="{{ route('niveis.index') }}" class="btn btn-primary">Retornar</a>

</form>
@endsection
