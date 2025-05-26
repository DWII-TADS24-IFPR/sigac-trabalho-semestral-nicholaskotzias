@extends('layouts.app')

@section('title', 'Cursos')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Lista de Cursos</h1>

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
        <a href="{{ route('cursos.create') }}" class="btn btn-primary">Adicionar Curso</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sigla</th>
                    <th scope="col">Total de Horas</th>
                    <th scope="col">Nível</th>
                    <th scope="col">
                </tr>
            </thead>
            <tbody>
                @forelse($cursos as $curso)
                    <tr>
                        <td>{{ $curso->id }}</td>
                        <td>{{ $curso->nome }}</td>
                        <td>{{ $curso->sigla }}</td>
                        <td>{{ $curso->total_horas }} horas</td>
                        <td>{{ $curso->nivel ? $curso->nivel->nome : 'Nível não atribuído' }}</td>
                        <td class="text-end">
                            <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-sm btn-info me-2">Ver</a>
                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-sm btn-warning me-2">Atualizar</a>
                            <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este curso?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">Nenhum curso encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
