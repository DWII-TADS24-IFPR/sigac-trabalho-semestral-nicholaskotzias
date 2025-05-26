@extends('layouts.app')

@section('title', 'Comprovantes')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Lista de Comprovantes</h1>

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
        <a href="{{ route('comprovantes.create') }}" class="btn btn-primary">Adicionar Comprovante</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Horas</th>
                    <th scope="col">Atividade</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Aluno</th>
                    <th scope="col">
                </tr>
            </thead>
            <tbody>
                @forelse($comprovantes as $comprovante)
                    <tr>
                        <td>{{ $comprovante->id }}</td>
                        <td>{{ $comprovante->horas }} horas</td>
                        <td>{{ $comprovante->atividade }}</td>
                        <td>{{ $comprovante->categoria ? $comprovante->categoria->nome : 'Categoria não atribuída' }}</td>
                        <td>{{ $comprovante->aluno ? $comprovante->aluno->nome : 'Aluno não atribuído' }}</td>
                        <td class="text-end">
                            <a href="{{ route('comprovantes.show', $comprovante->id) }}" class="btn btn-sm btn-info me-2">Ver</a>
                            <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-sm btn-warning me-2">Atualizar</a>
                            <form action="{{ route('comprovantes.destroy', $comprovante->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este comprovante?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Nenhum comprovante encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
