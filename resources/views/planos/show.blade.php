@extends('layouts.app')

@section('content')

<div class="mb-4">

    <a
        href="{{ route('planos.index') }}"
        class="text-decoration-none small">

        ← Voltar para planos

    </a>

    <div class="d-flex justify-content-between align-items-center mt-2">

        <div>

            <h1 class="h3 fw-bold mb-1">
                {{ $plano->nome }}
            </h1>

            <p class="text-secondary mb-0">
                Detalhes do plano
            </p>

        </div>

        <a
            href="{{ route('planos.edit', $plano->id_encriptado) }}"
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
                    {{ $plano->nome }}
                </div>

            </div>

            <div class="col-md-6">

                <small class="text-secondary">
                    Preço
                </small>

                <div class="fw-semibold">
                    R$ {{ number_format($plano->preco, 2, ',', '.') }}
                </div>

            </div>

            <div class="col-md-6">

                <small class="text-secondary">
                    Duração
                </small>

                <div class="fw-semibold">
                    {{ $plano->duracao_dias }} dias
                </div>

            </div>

            <div class="col-md-6">

                <small class="text-secondary">
                    Status
                </small>

                <div>

                    @if($plano->status === 'ativo')

                        <span class="badge text-bg-success">
                            Ativo
                        </span>

                    @else

                        <span class="badge text-bg-secondary">
                            Inativo
                        </span>

                    @endif

                </div>

            </div>

            <div class="col-md-6">

                <small class="text-secondary">
                    Alunos vinculados
                </small>

                <div class="fw-semibold">
                    {{ $plano->alunos_count }}
                </div>

            </div>

            <div class="col-12">

                <small class="text-secondary">
                    Descrição
                </small>

                <div class="fw-semibold">
                    {{ $plano->descricao ?? 'Sem descrição.' }}
                </div>

            </div>

        </div>

    </div>

</div>

@endsection