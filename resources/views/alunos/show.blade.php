@extends('layouts.app')

@section('content')

<div class="mb-4">

    <a
        href="{{ route('alunos.index') }}"
        class="text-decoration-none small">

        ← Voltar para alunos

    </a>

    <div class="d-flex justify-content-between align-items-center mt-2">

        <div>

            <h1 class="h3 fw-bold mb-1">
                {{ $aluno->nome }}
            </h1>

            <p class="text-secondary mb-0">
                Detalhes do aluno
            </p>

        </div>

        <a
            href="{{ route('alunos.edit', $aluno->id_encriptado) }}"
            class="btn btn-primary">

            Editar

        </a>

    </div>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-4">

        <div class="row g-4">

            <div class="col-md-6">

                <small class="text-secondary">
                    Nome
                </small>

                <div class="fw-semibold">
                    {{ $aluno->nome }}
                </div>

            </div>

            <div class="col-md-6">

                <small class="text-secondary">
                    E-mail
                </small>

                <div class="fw-semibold">
                    {{ $aluno->email }}
                </div>

            </div>

            <div class="col-md-6">

                <small class="text-secondary">
                    Telefone
                </small>

                <div class="fw-semibold">
                    {{ $aluno->telefone }}
                </div>

            </div>

            <div class="col-md-6">

                <small class="text-secondary">
                    Data de nascimento
                </small>

                <div class="fw-semibold">
                    {{ $aluno->data_nascimento->format('d/m/Y') }}
                </div>

            </div>

            <div class="col-md-6">

                <small class="text-secondary">
                    Plano
                </small>

                <div class="fw-semibold">
                    {{ $aluno->plano->nome }}
                </div>

            </div>

            <div class="col-md-6">

                <small class="text-secondary">
                    Preço do plano
                </small>

                <div class="fw-semibold">
                    R$ {{ number_format($aluno->plano->preco, 2, ',', '.') }}
                </div>

            </div>

            <div class="col-12">

                <small class="text-secondary">
                    Objetivo
                </small>

                <div class="fw-semibold">
                    {{ $aluno->objetivo }}
                </div>

            </div>

            <div class="col-md-6">

                <small class="text-secondary">
                    Cadastro
                </small>

                <div class="fw-semibold">
                    {{ $aluno->created_at->format('d/m/Y H:i') }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection