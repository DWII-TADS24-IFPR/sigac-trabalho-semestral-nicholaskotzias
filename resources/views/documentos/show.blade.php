@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
<h1>Visualizar Categoria</h1>

<table class="table table-white">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">MAXIMO HORAS</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col">{{ $curso->id }}</td>
            <td scope="col">{{ $curso->maximo_horas }}</td>
            <td scope="col">{{ $categoria->curso->id }}</td>

        </tr>
    </tbody>
</table>

<h1>Visualizar Curso de Categoria</h1>

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

<button class="btn btn-primary" onclick="window.location.href='{{route('cursos.index')}}'">Retornar</button>
@endsection
