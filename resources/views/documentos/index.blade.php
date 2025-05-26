@extends('layouts.app')

@section('title', 'Documentos')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Lista de Documentos</h1>

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
        <a href="{{ route('documentos.create') }}" class="btn btn-primary">Adicionar Documento</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">URL</th>
                    <th scope="col">Descricao</th>
                    <th scope="col">Horas_in</th>
                    <th scope="col">Status</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Horas_out</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">
                </tr>
            </thead>
            <tbody>
                @forelse($documentos as $documento)
                    <tr>
                        <td>{{ $documento->url }}</td>
                        <td>{{ $documento->descricao }}</td>
                        <td>{{ $documento->horas_in }} horas</td>
                        <td>{{ $documento->status }}</td>
                        <td>{{ $documento->comentario }}</td>
                        <td>{{ $documento->horas_out }} horas</td>
                        <td>{{ $documento->categoria ? $documento->categoria->nome : 'Categoria não atribuída' }}</td>
                        <td class="text-end">
                            <a href="{{ route('documentos.show', $documento->id) }}" class="btn btn-sm btn-info me-2">Ver</a>
                            <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-sm btn-warning me-2">Atualizar</a>
                            <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este documento?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Nenhum documento encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
