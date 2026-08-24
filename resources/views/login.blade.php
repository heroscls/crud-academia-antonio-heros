@extends('layouts.main_layout')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="row justify-content-center w-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
            
            <div class="card border-0 shadow-lg rounded-4 bg-dark text-white overflow-hidden">
                <div class="card-body p-4 p-sm-5">
                    
                    <div class="text-center mb-4">
                        <img src="{{ asset('assets/image/logo.png') }}" alt="ProjectGym logo" class="img-fluid mb-3" style="max-height: 60px;">
                        <h4 class="fw-bold mb-1">Bem-vindo</h4>
                    </div>

                    <form action="{{ route('login.submit') }}" method="POST" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="text_name" class="form-label text-secondary small text-uppercase fw-semibold">Usuário</label>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary border-secondary text-info">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <input type="text" 
                                       id="text_name"
                                       name="text_name" 
                                       class="form-control bg-dark text-info border-secondary @error('text_name') is-invalid @enderror" 
                                       placeholder="Digite seu usuário"
                                       value="{{ old('text_name') }}">
                            </div>
                            @error('text_name')
                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="text_password" class="form-label text-secondary small text-uppercase fw-semibold">Senha</label>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary border-secondary text-info">
                                    <i class="fa-solid fa-key"></i>
                                </span>
                                <input type="password" 
                                       id="text_password"
                                       name="text_password" 
                                       class="form-control bg-dark text-info border-secondary @error('text_password') is-invalid @enderror" 
                                       placeholder="Digite sua senha">
                            </div>
                            @error('text_password')
                                <div class="invalid-feedback d-block mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-info text-dark fw-bold py-2 shadow-sm rounded-3">
                                <i class="fa-solid fa-right-to-bracket me-2"></i>LOGIN
                            </button>
                        </div>
                        <div class="text-center mt-3">
                            <span class="text-secondary small">Ainda não tem uma conta?</span>
                            <a href="{{ route('cadastrar') }}" class="text-info text-decoration-none fw-bold small ms-1 align-middle">
                                CADASTRAR-SE
                            </a>
                        </div>
                    </form>

                    @if(session('login_error'))
                        <div class="alert alert-danger alert-dismissible fade show text-center rounded-3 py-2 mb-0 mt-3" role="alert">
                            <i class="fa-solid fa-circle-exclamation me-1"></i>
                            {{ session('login_error') }}
                        </div>
                    @endif

                    <div class="text-center text-muted mt-4 pt-3 border-top border-secondary border-opacity-25">
                        <small>&copy; {{ date('Y') }} ProjectGym. Todos os direitos reservados.</small>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection