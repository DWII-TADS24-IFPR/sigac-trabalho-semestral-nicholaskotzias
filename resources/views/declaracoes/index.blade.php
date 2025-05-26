@extends('layouts.app')

@section('title', 'Declarações')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Lista de Declarações</h1>

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
        <a href="{{ route('declaracoes.create') }}" class="btn btn-primary">Adicionar Declaração</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Hash</th>
                    <th scope="col">Data</th>
                    <th scope="col">Aluno</th>
                    <th scope="col">Comprovante</th>
                    <th scope="col">
                </tr>
            </thead>
            <tbody>
                @forelse($declaracoes as $declaracao)
                    <tr>
                        <td>{{ $declaracao->id }}</td>
                        <td>{{ $declaracao->hash }}</td>
                        <td>{{ $declaracao->data }}</td>
                        <td>{{ $declaracao->aluno ? $declaracao->aluno->nome : 'Aluno não atribuído' }}</td>
                        <td>{{ $declaracao->comprovante ? $declaracao->comprovante->atividade : 'Comprovante não atribuído' }}</td>
                        <td class="text-end">
                            <a href="{{ route('declaracoes.show', $declaracao->id) }}" class="btn btn-sm btn-info me-2">Ver</a>
                            <a href="{{ route('declaracoes.edit', $declaracao->id) }}" class="btn btn-sm btn-warning me-2">Atualizar</a>
                            <form action="{{ route('declaracoes.destroy', $declaracao->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta declaracao?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Nenhuma declaração encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
