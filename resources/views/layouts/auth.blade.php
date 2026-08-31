<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Login' }} - Fitly</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

    <main class="min-vh-100 d-flex align-items-center justify-content-center py-5">

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-sm-10 col-md-6 col-lg-4">

                    <div class="text-center mb-4">

                        <div class="bg-primary text-white rounded-3
                                    d-inline-flex align-items-center
                                    justify-content-center"
                            style="width: 48px; height: 48px;">

                            <strong class="fs-5">F</strong>

                        </div>

                        <h1 class="h3 fw-bold mt-3 mb-1">
                            Fitly
                        </h1>

                        <p class="text-secondary mb-0">
                            Acesse sua conta para continuar
                        </p>

                    </div>

                    <div class="card border-0 shadow-sm rounded-4">

                        <div class="card-body p-4 p-md-5">

                            @yield('content')

                        </div>

                    </div>

                    <p class="text-center text-secondary small mt-4">
                        © {{ date('Y') }} Fitly
                    </p>

                </div>

            </div>
        </div>

    </main>

</body>

</html>F