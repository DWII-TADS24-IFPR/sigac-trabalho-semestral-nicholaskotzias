@extends('layouts.app')

@section('title', 'Turmas')

@section('content')
<h1>Visualizar Turma</h1>

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

<h1>Visualizar Curso de Turma</h1>

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


<button class="btn btn-primary" onclick="window.location.href='{{route('turmas.index')}}'">Retornar</button>
@endsection
