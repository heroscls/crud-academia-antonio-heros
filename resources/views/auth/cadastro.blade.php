@extends('layouts.auth')

@section('content')

    <div class="mb-4">
        <h2 class="h4 fw-semibold mb-1">
            Criar conta
        </h2>

        <p class="text-secondary small mb-0">
            Cadastre-se para acessar o sistema.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger small" role="alert">
            <div class="fw-semibold mb-1">
                Corrija os seguintes erros:
            </div>

            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        method="POST"
        action="{{ route('register.store') }}"
    >
        @csrf

        {{-- Nome --}}
        <div class="mb-3">
            <label
                for="name"
                class="form-label fw-medium"
            >
                Nome completo
            </label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
                placeholder="Digite seu nome completo"
                autocomplete="name"
                required
                autofocus
            >

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- E-mail --}}
        <div class="mb-3">
            <label
                for="email"
                class="form-label fw-medium"
            >
                E-mail
            </label>

            <input
                type="email"
                id="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                placeholder="seu@email.com"
                autocomplete="email"
                required
            >

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Senha --}}
        <div class="mb-3">
            <label
                for="password"
                class="form-label fw-medium"
            >
                Senha
            </label>

            <input
                type="password"
                id="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Mínimo de 8 caracteres"
                autocomplete="new-password"
                required
            >

            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- Confirmar senha --}}
        <div class="mb-4">
            <label
                for="password_confirmation"
                class="form-label fw-medium"
            >
                Confirmar senha
            </label>

            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="form-control"
                placeholder="Digite a senha novamente"
                autocomplete="new-password"
                required
            >
        </div>

        <button
            type="submit"
            class="btn btn-primary w-100 py-2 fw-semibold"
        >
            Criar conta
        </button>
    </form>

    <div class="text-center mt-4">
        <span class="text-secondary small">
            Já possui uma conta?
        </span>

        <a
            href="{{ route('login') }}"
            class="small text-decoration-none fw-semibold"
        >
            Entrar
        </a>
    </div>

@endsection