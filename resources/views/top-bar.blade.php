<div class="row mb-3 align-items-center">
    <div class="col">
        <a href="{{ route('alunos.index') }}">
            <!-- Adicionado style para controlar a largura/altura da imagem -->
            <img src="{{ asset('assets/image/logo.png') }}" alt="Gym Logo" style="width: 120px; height: auto;">
        </a>
    </div>

    <div class="col">
        <div class="d-flex justify-content-end align-items-center">
            <span class="me-3"><i class="fa-solid fa-user-circle fa-lg text-secondary me-3"></i>{{ session()->get('aluno.name') }}</span>
            <a href="{{ route('logout') }}" class="btn btn-outline-secondary px-3">
                Logout<i class="fa-solid fa-arrow-right-from-bracket ms-2"></i>
            </a>
        </div>
    </div>
</div>
<hr>