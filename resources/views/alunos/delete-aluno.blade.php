@extends('layouts.main_layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">

            <!-- confirm delete -->
            <div class="card p-5 text-center shadow-sm border-0">
                <span class="display-3 mb-4">
                    <i class="fa-solid fa-triangle-exclamation text-warning opacity-75"></i>
                </span>
                
                <h3 class="text-info-subtle mb-1">{{ $aluno->name }}</h3>
                <p class="text-secondary-subtle mb-4">
                    <i class="fa-regular fa-envelope me-1"></i> {{ $aluno->email }}
                </p>

                <p class="fs-5 text-light opacity-75">Confirma a exclusão deste aluno?</p>

                <div class="mt-3">
                    <a href="{{ route('alunos.index') }}" class="btn btn-primary px-5 m-2">
                        <i class="fa-solid fa-xmark me-2"></i>Não
                    </a>
                    <a href="{{ route('deleteAlunoConfirm', \App\Services\Operations::encryptId($aluno->id)) }}" class="btn btn-danger px-5 m-2">
                        <i class="fa-solid fa-trash me-2"></i>Sim
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection