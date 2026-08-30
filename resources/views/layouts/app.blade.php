<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        {{ $title ?? 'Fitly' }}
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-light">

    @include('components.top_bar')

    <main class="container py-4">

        @if(session('success'))

            <div
                class="alert alert-success alert-dismissible fade show"
                role="alert">

                {{ session('success') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif

        @if(session('error'))

            <div
                class="alert alert-danger alert-dismissible fade show"
                role="alert">

                {{ session('error') }}

                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
                </button>

            </div>

        @endif

        @yield('content')

    </main>

</body>

</html>