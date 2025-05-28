@extends('layouts.app')

@section('title', 'Documentos')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4 text-center">Aprovação de Documentos</h1>

    @if (session('success'))
        <x-alert tipo="success">
            {{ session('success') }}
        </x-alert>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>URL</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documentos as $documento)
                    <tr>
                        <td>{{ $documento->id }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $documento->url) }}" target="_blank" download>Baixar</a>
                        </td>
                        <td>{{ $documento->descricao }}</td>
                        <td>{{ ucfirst($documento->status) }}</td>
                        <td class="text-end">
                            <form action="{{ route('admin.documentos.aprovar', $documento->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Aprovar</button>
                            </form>

                            <form action="{{ route('admin.documentos.rejeitar', $documento->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Rejeitar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Nenhum documento encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
