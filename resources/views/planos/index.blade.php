<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Planos</title>
</head>

<body>

    <h1>Lista de Planos</h1>

    @if(session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
    @endif

    <a href="/planos/cadastrar">
        Cadastrar Plano
    </a>

    <br><br>

    <table border="1" cellpadding="10">

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Duração</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            @foreach($planos as $plano)

            <tr>

                <td>
                    {{ $plano->id }}
                </td>

                <td>
                    {{ $plano->nome }}
                </td>

                <td>
                    {{ $plano->descricao }}
                </td>

                <td>
                    R$ {{ number_format($plano->preco, 2, ',', '.') }}
                </td>

                <td>
                    {{ $plano->duracao_dias }} dias
                </td>

                <td>
                    {{ $plano->status }}
                </td>

                <td>

                    <a href="/planos/{{ $plano->id_encriptado }}">
                        Ver
                    </a>

                    <a href="/planos/{{ $plano->id_encriptado }}/editar">
                        Editar
                    </a>

                    <form
                        action="/planos/{{ $plano->id_encriptado }}/excluir"
                        method="POST"
                        style="display: inline;">
                        @csrf

                        <button type="submit">
                            Excluir
                        </button>
                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>