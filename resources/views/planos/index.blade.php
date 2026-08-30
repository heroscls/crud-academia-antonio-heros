@extends('layouts.app')

@section('content')

<div class="d-flex flex-column flex-md-row
            justify-content-between align-items-md-center
            gap-3 mb-4">

    <div>

        <h1 class="h3 fw-bold mb-1">
            Planos
        </h1>

        <p class="text-secondary mb-0">
            Gerencie os planos disponíveis.
        </p>

    </div>

    <a
        href="{{ route('planos.create') }}"
        class="btn btn-primary">

        <i class="bi bi-plus-lg me-1"></i>
        Novo plano

    </a>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-0">

        @if($planos->count())

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="ps-4">
                                Nome
                            </th>

                            <th>
                                Descrição
                            </th>

                            <th>
                                Preço
                            </th>

                            <th>
                                Duração
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Alunos
                            </th>

                            <th class="text-end pe-4">
                                Ações
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($planos as $plano)

                            <tr>

                                <td class="ps-4">

                                    <div class="fw-semibold">
                                        {{ $plano->nome }}
                                    </div>

                                    <small class="text-secondary">
                                        ID #{{ $plano->id }}
                                    </small>

                                </td>

                                <td>
                                    {{ $plano->descricao ?? 'Sem descrição' }}
                                </td>

                                <td>
                                    R$ {{ number_format($plano->preco, 2, ',', '.') }}
                                </td>

                                <td>
                                    {{ $plano->duracao_dias }} dias
                                </td>

                                <td>

                                    @if($plano->status === 'ativo')

                                        <span class="badge text-bg-success">
                                            Ativo
                                        </span>

                                    @else

                                        <span class="badge text-bg-secondary">
                                            Inativo
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    {{ $plano->alunos_count }}
                                </td>

                                <td class="text-end pe-4">

                                    <div class="btn-group">

                                        <a
                                            href="{{ route('planos.show', $plano->id_encriptado) }}"
                                            class="btn btn-sm btn-outline-secondary">

                                            Ver

                                        </a>

                                        <a
                                            href="{{ route('planos.edit', $plano->id_encriptado) }}"
                                            class="btn btn-sm btn-outline-primary">

                                            Editar

                                        </a>

                                        <form
                                            action="{{ route('planos.destroy', $plano->id_encriptado) }}"
                                            method="POST"
                                            onsubmit="return confirm('Deseja realmente excluir este plano?')">

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

                <i class="bi bi-card-list fs-1 text-secondary"></i>

                <h2 class="h5 mt-3">
                    Nenhum plano cadastrado
                </h2>

                <a
                    href="{{ route('planos.create') }}"
                    class="btn btn-primary">

                    Cadastrar plano

                </a>

            </div>

        @endif

    </div>

</div>

@endsection