@extends('layouts.auth')

@section('content')

<div class="mb-4">

    <h2 class="h4 fw-semibold mb-1">
        Entrar
    </h2>

    <p class="text-secondary small mb-0">
        Informe seus dados para acessar o sistema.
    </p>

</div>


@if ($errors->any())

<div class="alert alert-danger small">

    <div class="fw-semibold mb-1">
        Não foi possível entrar.
    </div>

    <ul class="mb-0 ps-3">

        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach

    </ul>

</div>

@endif


@if (session('success'))

<div class="alert alert-success small">
    {{ session('success') }}
</div>

@endif


<form
    method="POST"
    action="{{ route('login.store') }}">

    @csrf


    <div class="mb-3">

        <label
            for="email"
            class="form-label fw-medium">
            E-mail
        </label>

        <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="seu@email.com"
            autocomplete="email"
            required
            autofocus>

        @error('email')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
        @enderror

    </div>


    <div class="mb-3">

        <label
            for="password"
            class="form-label fw-medium">
            Senha
        </label>

        <input
            type="password"
            class="form-control"
            id="password"
            name="password"
            placeholder="Digite sua senha"
            autocomplete="current-password"
            required>

        @error('password')
        <div class="text-danger small mt-1">
            {{ $message }}
        </div>
        @enderror

    </div>


    <div class="form-check mb-4">

        <input
            class="form-check-input"
            type="checkbox"
            name="remember"
            id="remember"
            value="1">

        <label
            class="form-check-label small"
            for="remember">
            Lembrar de mim
        </label>

    </div>


    <button
        type="submit"
        class="btn btn-primary w-100 py-2 fw-semibold">
        Entrar
    </button>

</form>

@endsection