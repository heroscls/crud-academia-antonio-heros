    <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">

        <div class="container">

            <a
                href="{{ route('home') }}"
                class="navbar-brand fw-bold text-primary">
                Fitly
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div
                class="collapse navbar-collapse"
                id="navbar">

                <ul class="navbar-nav me-auto">


                    <li class="nav-item">
                        <a
                            href="{{ route('dashboard') }}"
                            class="nav-link">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="{{ route('alunos.index') }}"
                            class="nav-link">
                            Alunos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a
                            href="{{ route('planos.index') }}"
                            class="nav-link">
                            Planos
                        </a>
                    </li>


                </ul>

                <div class="dropdown">

                    <button
                        class="btn btn-light dropdown-toggle"
                        data-bs-toggle="dropdown">

                        {{ auth()->user()->name }}

                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>

                            <span class="dropdown-item-text small text-secondary">
                                {{ auth()->user()->email }}
                            </span>

                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>

                            <form
                                method="POST"
                                action="{{ route('logout') }}">

                                @csrf

                                <button
                                    type="submit"
                                    class="dropdown-item text-danger">

                                    Sair

                                </button>

                            </form>

                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </nav>