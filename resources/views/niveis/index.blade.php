@extends('layouts.app')

@section('title', 'Níveis')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Lista de Níveis</h1>

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
        <a href="{{ route('niveis.create') }}" class="btn btn-primary">Adicionar Nível</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">
                </tr>
            </thead>
            <tbody>
                @forelse($niveis as $nivel)
                    <tr>
                        <td>{{ $nivel->id }}</td>
                        <td>{{ $nivel->nome }}</td>
                        <td class="text-end">
                            <a href="{{ route('niveis.show', $nivel->id) }}" class="btn btn-sm btn-info me-2">Ver</a>
                            <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-sm btn-warning me-2">Atualizar</a>
                            <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este nível?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">Nenhum nível encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
