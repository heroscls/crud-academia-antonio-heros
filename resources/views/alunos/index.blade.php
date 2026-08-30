@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @include('top-bar')
            <!-- Sem alunos cadastrados -->
            @if(count($alunos) === 0)
            <div class="row mt-5">
                <div class="col text-center">
                    <p class="display-6 mb-5 text-secondary opacity-50">Nenhum aluno cadastrado no momento!</p>
                    <a href="{{ route('cadastrar') }}" class="btn btn-primary btn-lg p-3 px-5">
                        <i class="fa-solid fa-user-plus me-3"></i>Cadastrar Primeiro Aluno
                    </a>
                </div>
            </div>
            @else
            <!-- Com alunos cadastrados -->
            <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                <h3 class="text-secondary m-0"><i class="fa-solid fa-users me-2"></i>Meus Alunos</h3>
                <a href="{{ route('cadastrar') }}" class="btn btn-primary px-3">
                    <i class="fa-solid fa-user-plus me-2"></i>Novo Aluno
                </a>
            </div>

            @foreach ($alunos as $aluno)
                @include('alunos.card')
            @endforeach
            @endif

        </div>
    </div>
</div>
@endsection