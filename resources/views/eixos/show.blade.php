@extends('layouts.app')

@section('title', 'Eixos')

@section('content')
<h1>Visualizar Eixo</h1>

<table class="table table-white">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col">{{ $eixo->id }}</td>
            <td scope="col">{{ $eixo->nome }}</td>
        </tr>
    </tbody>
</table>


<button class="btn btn-primary" onclick="window.location.href='{{route('eixos.index')}}'">Retornar</button>
@endsection
