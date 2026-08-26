@extends('layouts.app')

@section('content')

<div class="d-flex flex-column flex-md-row
            justify-content-between align-items-md-center
            gap-3 mb-4">

    <div>

        <h1 class="h3 fw-bold mb-1">
            Alunos
        </h1>

        <p class="text-secondary mb-0">
            Gerencie os alunos cadastrados no sistema.
        </p>

    </div>

    <a
        href="{{ route('alunos.create') }}"
        class="btn btn-primary">

        <i class="bi bi-person-plus me-1"></i>
        Novo aluno

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        @if($alunos->count())

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="ps-4">
                                Nome
                            </th>

                            <th>
                                E-mail
                            </th>

                            <th>
                                Telefone
                            </th>

                            <th>
                                Plano
                            </th>

                            <th>
                                Objetivo
                            </th>

                            <th class="text-end pe-4">
                                Ações
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($alunos as $aluno)

                            <tr>

                                <td class="ps-4">

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="bg-primary bg-opacity-10
                                                   text-primary rounded-circle
                                                   d-flex align-items-center
                                                   justify-content-center
                                                   me-3"
                                            style="width: 40px; height: 40px;">

                                            {{ strtoupper(substr($aluno->nome, 0, 1)) }}

                                        </div>

                                        <div>

                                            <div class="fw-semibold">
                                                {{ $aluno->nome }}
                                            </div>

                                            <small class="text-secondary">
                                                ID #{{ $aluno->id }}
                                            </small>

                                        </div>

                                    </div>

                                </td>

                                <td>
                                    {{ $aluno->email }}
                                </td>

                                <td>
                                    {{ $aluno->telefone }}
                                </td>

                                <td>

                                    <span class="badge text-bg-primary">

                                        {{ $aluno->plano->nome }}

                                    </span>

                                </td>

                                <td>
                                    {{ \Illuminate\Support\Str::limit($aluno->objetivo, 30) }}
                                </td>

                                <td class="text-end pe-4">

                                    <div class="btn-group">

                                        <a
                                            href="{{ route('alunos.show', $aluno->id_encriptado) }}"
                                            class="btn btn-sm btn-outline-secondary">

                                            Ver

                                        </a>

                                        <a
                                            href="{{ route('alunos.edit', $aluno->id_encriptado) }}"
                                            class="btn btn-sm btn-outline-primary">

                                            Editar

                                        </a>

                                        <form
                                            action="{{ route('alunos.destroy', $aluno->id_encriptado) }}"
                                            method="POST"
                                            onsubmit="return confirm('Deseja realmente excluir este aluno?')">

                                            @csrf

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger">

                                                Excluir

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="text-center py-5">

                <i class="bi bi-people fs-1 text-secondary"></i>

                <h2 class="h5 mt-3">
                    Nenhum aluno cadastrado
                </h2>

                <p class="text-secondary">
                    Comece cadastrando o primeiro aluno.
                </p>

                <a
                    href="{{ route('alunos.create') }}"
                    class="btn btn-primary">

                    Cadastrar aluno

                </a>

            </div>

        @endif

    </div>

</div>

@endsection