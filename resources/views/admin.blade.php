@extends('layouts.app')

@section('title', 'Admin')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4 text-center">Área do ADM</h1>

    <div class="d-flex flex-column justify-content-center gap-3">
        <a href="{{ route('niveis.index') }}" class="btn btn-primary btn-lg px-4" style="min-width: 160px;">Nível</a>
        <a href="{{ route('eixos.index') }}" class="btn btn-primary btn-lg px-4" style="min-width: 160px;">Eixo</a>
        <a href="{{ route('cursos.index') }}" class="btn btn-primary btn-lg px-4" style="min-width: 160px;">Curso</a>
        <a href="{{ route('turmas.index') }}" class="btn btn-primary btn-lg px-4" style="min-width: 160px;">Turma</a>
        <a href="{{ route('alunos.index') }}" class="btn btn-primary btn-lg px-4" style="min-width: 160px;">Aluno</a>
        <a href="{{ route('categorias.index') }}" class="btn btn-primary btn-lg px-4" style="min-width: 160px;">Categoria</a>
        <a href="{{ route('comprovantes.index') }}" class="btn btn-primary btn-lg px-4" style="min-width: 160px;">Comprovante</a>
        <a href="{{ route('admin.documentos') }}" class="btn btn-primary btn-lg px-4" style="min-width: 160px;">Documentos</a>
    </div>
</div>

@endsection
