@extends('layouts.app')

@section('title', 'Alunos')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Lista de Alunos</h1>

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
        <a href="{{ route('alunos.create') }}" class="btn btn-primary">Adicionar Aluno</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Email</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Turma</th>
                    <th scope="col">
                </tr>
            </thead>
            <tbody>
                @forelse($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->id }}</td>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->cpf }}</td>
                        <td>{{ $aluno->email }}</td>
                        <td>{{ $aluno->curso ? $aluno->curso->nome : 'Curso não atribuído' }}</td>
                        <td>{{ $aluno->turma ? $aluno->turma->ano : 'Turma não atribuída' }}</td>
                        <td class="text-end">
                            <a href="{{ route('alunos.show', $aluno->id) }}" class="btn btn-sm btn-info me-2">Ver</a>
                            <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-sm btn-warning me-2">Atualizar</a>
                            <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Nenhum aluno encontrado.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
