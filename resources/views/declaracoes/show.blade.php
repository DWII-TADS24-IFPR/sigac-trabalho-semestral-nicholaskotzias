@extends('layouts.app')

@section('title', 'Declarações')

@section('content')
<h1>Visualizar Declaração</h1>

<table class="table table-white">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">HASH</th>
            <th scope="col">DATA</th>
            <th scope="col">ALUNO</th>
            <th scope="col">COMPROVANTE</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $declaracao->id }}</td>
            <td>{{ $declaracao->hash }}</td>
            <td>{{ $declaracao->data }}</td>
            <td>{{ $declaracao->aluno ? $declaracao->aluno->nome : 'Aluno não atribuído' }}</td>
            <td>{{ $declaracao->comprovante ? $declaracao->comprovante->atividade : 'Comprovante não atribuído' }}</td>
        </tr>
    </tbody>
</table>

<h1>Visualizar Aluno de Declaração</h1>

<table class="table table-white">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">CPF</th>
            <th scope="col">EMAIL</th>
            <th scope="col">CURSO</th>
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

<h1>Visualizar Comprovante de Declaração</h1>

<table class="table table-white">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">HORAS</th>
            <th scope="col">ATIVIDADE</th>
            <th scope="col">CATEGORIA</th>
            <th scope="col">ALUNO</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $comprovante->id }}</td>
            <td>{{ $comprovante->horas }} horas</td>
            <td>{{ $comprovante->atividade }}</td>
            <td>{{ $comprovante->categoria ? $comprovante->categoria->nome : 'Categoria não atribuído' }}</td>
            <td>{{ $comprovante->aluno ? $comprovante->aluno->nome : 'Aluno não atribuído' }}</td>
        </tr>
    </tbody>
</table>

<button class="btn btn-primary" onclick="window.location.href='{{route('declaracoes.index')}}'">Retornar</button>
@endsection
