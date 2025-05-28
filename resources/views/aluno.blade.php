@extends('layouts.app')

@section('title', 'Aluno')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4 text-center">Área do Aluno</h1>

    <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="{{ route('alunos.create') }}" class="btn btn-success btn-lg px-4" style="min-width: 200px;">Efetuar Cadastro</a>
        <a href="{{ route('documentos.index') }}" class="btn btn-info btn-lg px-4" style="min-width: 200px;">Adicionar Documento</a>
    </div>
</div>

@endsection
