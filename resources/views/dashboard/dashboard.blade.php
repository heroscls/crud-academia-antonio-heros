@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="h3 fw-bold mb-1">
            Dashboard
        </h1>

        <p class="text-secondary mb-0">
            Visão geral do sistema.
        </p>
    </div>

</div>


<div class="row g-4">

    {{-- Alunos --}}

    <div class="col-12 col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start">

                    <div>

                        <p class="text-secondary small mb-1">
                            Alunos
                        </p>

                        <h2 class="display-6 fw-bold mb-0">
                            {{ $totalAlunos ?? 0 }}
                        </h2>

                    </div>

                    <div
                        class="bg-primary bg-opacity-10
                                   text-primary rounded-3
                                   d-flex align-items-center
                                   justify-content-center"
                        style="width: 48px; height: 48px;">
                        <i class="bi bi-people fs-4"></i>
                    </div>

                </div>

                <a
                    href="{{ route('alunos.index') }}"
                    class="btn btn-sm btn-outline-primary mt-4">
                    Ver alunos
                </a>

            </div>

        </div>

    </div>

    {{-- Planos --}}
    <div class="col-12 col-md-6 col-xl-3">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <p class="text-secondary small mb-1">Planos</p>
                        <h2 class="display-6 fw-bold mb-0">{{ $totalPlanos ?? 0 }}</h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 text-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                        <i class="bi bi-card-checklist fs-4"></i>
                    </div>
                </div>
                <a href="{{ route('planos.index') }}" class="btn btn-sm btn-outline-primary mt-4">Ver planos</a>
            </div>
        </div>
    </div>

    {{-- Usuários --}}

    <div class="col-12 col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body p-4">

                <p class="text-secondary small mb-1">
                    Usuários
                </p>

                <h2 class="display-6 fw-bold mb-0">
                    {{ $totalUsuarios ?? 0 }}
                </h2>

                <p class="text-secondary small mt-3 mb-0">
                    Usuários cadastrados no sistema.
                </p>

            </div>

        </div>

    </div>


    {{-- Administradores --}}

    <div class="col-12 col-md-6 col-xl-3">

        <div class="card border-0 shadow-sm h-100">

            <div class="card-body p-4">

                <p class="text-secondary small mb-1">
                    Administradores
                </p>

                <h2 class="display-6 fw-bold mb-0">
                    {{ $totalAdmins ?? 0 }}
                </h2>

                <p class="text-secondary small mt-3 mb-0">
                    Administradores do sistema.
                </p>

            </div>

        </div>

    </div>

</div>


{{-- Ações rápidas --}}

<div class="card border-0 shadow-sm mt-4">

    <div class="card-body p-4">

        <h2 class="h5 fw-semibold mb-3">
            Ações rápidas
        </h2>

        <div class="d-flex flex-wrap gap-2">

            <a
                href="{{ route('alunos.create') }}"
                class="btn btn-primary">
                <i class="bi bi-person-plus me-1"></i>
                Novo aluno
            </a>

            <a
                href="{{ route('alunos.index') }}"
                class="btn btn-outline-secondary">
                <i class="bi bi-people me-1"></i>
                Gerenciar alunos
            </a>

            <a href="{{ route('planos.create') }}" class="btn btn-outline-primary">
                <i class="bi bi-plus-circle me-1"></i> Novo plano
            </a>
            <a href="{{ route('planos.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-card-checklist me-1"></i> Gerenciar planos
            </a>

        </div>

    </div>

</div>

@endsection