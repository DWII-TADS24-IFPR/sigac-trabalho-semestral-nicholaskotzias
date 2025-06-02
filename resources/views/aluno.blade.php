@extends('layouts.app')

@section('title', 'Aluno')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4 text-center">Área do Aluno</h1>

    @if (session('error'))
        <x-alert tipo="danger">
            {{ session('error') }}
        </x-alert>
    @endif

    @if (session('success'))
        <x-alert tipo="success" id="success-message">
            {{ session('success') }}
        </x-alert>
    @endif

    <div class="d-flex flex-wrap justify-content-center gap-3">
        <a href="{{ route('aluno.documentos.create') }}" class="btn btn-info btn-lg px-4" style="min-width: 200px;">Adicionar Documento</a>
    </div>
</div>

@endsection
