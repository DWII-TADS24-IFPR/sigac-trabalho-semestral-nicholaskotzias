@extends('layouts.app')

@section('title', 'Turmas')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Lista de Turmas</h1>

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

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('turmas.create') }}" class="btn btn-primary">Adicionar Turma</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Curso</th>
                    <th scope="col">
                </tr>
            </thead>
            <tbody>
                @forelse($turmas as $turma)
                    <tr>
                        <td>{{ $turma->id }}</td>
                        <td>{{ $turma->ano }}</td>
                        <td>{{ $turma->curso ? $turma->curso->nome : 'Curso não atribuído' }}</td>
                        <td class="text-end">
                            <a href="{{ route('turmas.show', $turma->id) }}" class="btn btn-sm btn-info me-2">Ver</a>
                            <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-sm btn-warning me-2">Atualizar</a>
                            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta turma?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Nenhuma turma encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
