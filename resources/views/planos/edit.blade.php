@extends('layouts.app')

@section('content')

<div class="mb-4">

    <a
        href="{{ route('planos.index') }}"
        class="text-decoration-none small">

        ← Voltar para planos

    </a>

    <h1 class="h3 fw-bold mt-2 mb-1">
        Editar plano
    </h1>

    <p class="text-secondary mb-0">
        Atualize os dados do plano.
    </p>

</div>

<div class="card border-0 shadow-sm">

    <div class="card-body p-4 p-md-5">

        <form
            method="POST"
            action="{{ route('planos.update', $plano->id_encriptado) }}">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Nome
                    </label>

                    <input
                        type="text"
                        name="nome"
                        value="{{ old('nome', $plano->nome) }}"
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
                        Preço
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        name="preco"
                        value="{{ old('preco', $plano->preco) }}"
                        class="form-control @error('preco') is-invalid @enderror"
                        required>

                    @error('preco')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-12 mb-3">

                    <label class="form-label">
                        Descrição
                    </label>

                    <textarea
                        name="descricao"
                        rows="3"
                        class="form-control @error('descricao') is-invalid @enderror">{{ old('descricao', $plano->descricao) }}</textarea>

                    @error('descricao')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Duração em dias
                    </label>

                    <input
                        type="number"
                        min="1"
                        name="duracao_dias"
                        value="{{ old('duracao_dias', $plano->duracao_dias) }}"
                        class="form-control @error('duracao_dias') is-invalid @enderror"
                        required>

                    @error('duracao_dias')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-4">

                    <label class="form-label">
                        Status
                    </label>

                    <select
                        name="status"
                        class="form-select @error('status') is-invalid @enderror"
                        required>

                        <option
                            value="ativo"
                            @selected(old('status', $plano->status) === 'ativo')>
                            Ativo
                        </option>

                        <option
                            value="inativo"
                            @selected(old('status', $plano->status) === 'inativo')>
                            Inativo
                        </option>

                    </select>

                    @error('status')
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
                    href="{{ route('planos.index') }}"
                    class="btn btn-outline-secondary">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection