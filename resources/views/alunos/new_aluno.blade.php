@extends('layouts.main_layout')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            
            <div class="card card-premium shadow-lg border-0 bg-white">
                <div class="top-gradient-bar"></div>
                
                <div class="p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box">
                                <i class="fa-solid fa-user-plus fs-4"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold text-dark mb-1" style="letter-spacing: -0.5px;">Novo Aluno</h3>
                                <p class="text-secondary small mb-0">Preencha as informações para registrar um novo aluno</p>
                            </div>
                        </div>
                        </a>
                    </div>

                    <form action="{{ route('alunos.salvar') }}" method="post">
                        @csrf
                        
                        <div class="row g-4">
                            <div class="col-12">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="fa-regular fa-id-card text-muted me-2"></i>Nome Completo
                                </label>
                                <input type="text" class="form-control form-control-custom fs-6 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback fw-medium mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="fa-regular fa-envelope text-muted me-2"></i>E-mail
                                </label>
                                <input type="email" class="form-control form-control-custom fs-6 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback fw-medium mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="fa-solid fa-address-card text-muted me-2"></i>CPF
                                </label>
                                <input type="text" class="form-control form-control-custom fs-6 @error('cpf') is-invalid @enderror" name="cpf" value="{{ old('cpf') }}">
                                @error('cpf')
                                    <div class="invalid-feedback fw-medium mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark mb-2">
                                    <i class="fa-solid fa-lock text-muted me-2"></i>Password
                                </label>
                                <input type="password" class="form-control form-control-custom fs-6 @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <div class="invalid-feedback fw-medium mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-5 text-muted opacity-25">

                        <div class="d-flex justify-content-end gap-3">
                            <a href="{{ route('alunos.index') }}" class="btn btn-light px-4 py-2 border rounded-3 fw-medium" style="color: #64748b;">
                                Cancelar
                            </a>
                        <button type="submit" class="btn btn-dark px-5 py-2 fw-semibold d-flex align-items-center gap-2">
                            <i class="fa-solid fa-user-check"></i> salvar aluno
                        </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection