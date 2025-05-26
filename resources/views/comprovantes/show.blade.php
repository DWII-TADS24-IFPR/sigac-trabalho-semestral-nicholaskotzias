@extends('layouts.app')

@section('title', 'Visualizar Comprovante')

@section('content')

<h1>Visualizar Comprovante</h1>

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
            <td>{{ $comprovante->categoria ? $comprovante->categoria->nome : 'Categoria não atribuída' }}</td>
            <td>{{ $comprovante->aluno ? $comprovante->aluno->nome : 'Aluno não atribuído' }}</td>
        </tr>
    </tbody>
</table>

<button class="btn btn-primary mt-3" onclick="window.location.href='{{ route('comprovantes.index') }}'">Retornar</button>

@endsection
