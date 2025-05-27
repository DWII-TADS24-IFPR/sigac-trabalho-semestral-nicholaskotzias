@extends('layouts.app')

@section('title', 'Eixos')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Lista de Eixos</h1>

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
        <a href="{{ route('eixos.create') }}" class="btn btn-primary">Adicionar Eixo</a>
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
                @forelse($eixos as $eixo)
                    <tr>
                        <td>{{ $eixo->id }}</td>
                        <td>{{ $eixo->nome }}</td>
                        <td class="text-end">
                            <a href="{{ route('eixos.show', $eixo->id) }}" class="btn btn-sm btn-info me-2">Ver</a>
                            <a href="{{ route('eixos.edit', $eixo->id) }}" class="btn btn-sm btn-warning me-2">Atualizar</a>
                            <form action="{{ route('eixos.destroy', $eixo->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este eixo?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">Nenhum eixo encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
