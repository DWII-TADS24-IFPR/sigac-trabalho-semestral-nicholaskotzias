@extends('layouts.app')

@section('title', 'Categorias')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Lista de Categorias</h1>

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
        <a href="{{ route('categorias.create') }}" class="btn btn-primary">Adicionar Categoria</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Maximo Horas</th>
                    <th scope="col">Curso</th>
                    <th scope="col">
                </tr>
            </thead>
            <tbody>
                @forelse($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nome }}</td>
                        <td>{{ $categoria->maximo_horas }} horas</td>
                        <td>{{ $categoria->curso ? $categoria->curso->nome : 'Curso não atribuído' }}</td>
                        <td class="text-end">
                            <a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-sm btn-info me-2">Ver</a>
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning me-2">Atualizar</a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Nenhuma categoria encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
