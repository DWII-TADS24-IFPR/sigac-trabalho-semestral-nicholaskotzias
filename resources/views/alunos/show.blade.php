@extends('layouts.app')

@section('title', 'Alunos')

@section('content')
<h1>Visualizar Aluno</h1>

<table class="table table-white">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">CPF</th>
            <th scope="col">EMAIL</th>
            <th scope="col">CURSO</th>
            <th scope="col">SENHA</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $aluno->id }}</td>
            <td>{{ $aluno->nome }}</td>
            <td>{{ $aluno->cpf }}</td>
            <td>{{ $aluno->email }}</td>
            <td>{{ $aluno->curso ? $aluno->curso->nome : 'Curso não atribuído' }}</td>
            <td>{{ $aluno->turma ? $aluno->turma->nome : 'Turma não atribuída' }}</td>
        </tr>
    </tbody>
</table>

<h1>Visualizar Curso de Aluno</h1>

<table class="table table-white">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">SIGLA</th>
            <th scope="col">TOTAL HORAS</th>
            <th scope="col">NIVEL ID</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col">{{ $curso->id }}</td>
            <td scope="col">{{ $curso->nome }}</td>
            <td scope="col">{{ $curso->sigla }}</td>
            <td scope="col">{{ $curso->total_horas }}</td>
            <td scope="col">{{ $curso->nivel->id }}</td>

        </tr>
    </tbody>
</table>

<h1>Visualizar Turma de Aluno</h1>

<table class="table table-white">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">ANO</th>
            <th scope="col">CURSO ID</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col">{{ $turma->id }}</td>
            <td scope="col">{{ $turma->ano }}</td>
            <td scope="col">{{ $turma->curso->id }}</td>
        </tr>
    </tbody>
</table>

<button class="btn btn-primary" onclick="window.location.href='{{route('alunos.index')}}'">Retornar</button>
@endsection
