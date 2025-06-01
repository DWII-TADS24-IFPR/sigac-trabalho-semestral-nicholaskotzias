@extends('layouts.app')

@section('title', 'Escolha de Login')

@section('content')

<div class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="text-center">
        <h1 class="mb-4 h4">Deseja fazer login como:</h1>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ url('/login/admin') }}"
               class="btn btn-outline-dark px-4 py-2">
               Login como Admin
            </a>

            <a href="{{ url('/login/aluno') }}"
               class="btn btn-outline-dark px-4 py-2">
               Login como Aluno
            </a>
        </div>
    </div>
</div>

@endsection
