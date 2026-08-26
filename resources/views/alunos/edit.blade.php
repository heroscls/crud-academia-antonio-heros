@extends('layouts.app')

@section('content')

<div class="mb-4">

    <a
        href="{{ route('alunos.index') }}"
        class="text-decoration-none small">
        ← Voltar para alunos
    </a>

    <h1 class="h3 fw-bold mt-2 mb-1">
        Editar aluno
    </h1>

    <p class="text-secondary mb-0">
        Atualize os dados de {{ $aluno->nome }}.
    </p>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-4 p-md-5">

        <form
            method="POST"
            action="{{ route('alunos.update', $aluno->id_encriptado) }}">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Nome completo
                    </label>

                    <input
                        type="text"
                        name="nome"
                        value="{{ old('nome', $aluno->nome) }}"
                        class="form-control @error('nome') is-invalid @enderror"
                        required>

                    @error('nome')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        E-mail
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $aluno->email) }}"
                        class="form-control @error('email') is-invalid @enderror"
                        required>

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Telefone
                    </label>

                    <input
                        type="text"
                        name="telefone"
                        value="{{ old('telefone', $aluno->telefone) }}"
                        class="form-control @error('telefone') is-invalid @enderror"
                        required>

                    @error('telefone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Data de nascimento
                    </label>

                    <input
                        type="date"
                        name="data_nascimento"
                        value="{{ old('data_nascimento', optional($aluno->data_nascimento)->format('Y-m-d')) }}"
                        class="form-control @error('data_nascimento') is-invalid @enderror"
                        required>

                    @error('data_nascimento')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label">
                        Objetivo
                    </label>

                    <textarea
                        name="objetivo"
                        rows="3"
                        class="form-control @error('objetivo') is-invalid @enderror"
                        required>{{ old('objetivo', $aluno->objetivo) }}</textarea>

                    @error('objetivo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Plano
                    </label>

                    <select
                        name="plano_id"
                        class="form-select @error('plano_id') is-invalid @enderror"
                        required>

                        <option value="">
                            Selecione um plano
                        </option>

                        @foreach($planos as $plano)

                            <option
                                value="{{ $plano->id }}"
                                @selected(old('plano_id', $aluno->plano_id) == $plano->id)>

                                {{ $plano->nome }} -
                                R$ {{ number_format($plano->preco, 2, ',', '.') }}

                            </option>

                        @endforeach

                    </select>

                    @error('plano_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

            </div>

            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-primary">
                    Salvar alterações
                </button>

                <a
                    href="{{ route('alunos.index') }}"
                    class="btn btn-outline-secondary">
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>

@endsection