<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Visualizar Plano</title>
</head>

<body>

    <h1>Detalhes do Plano</h1>

    <p>
        <strong>ID:</strong>
        {{ $plano->id }}
    </p>

    <p>
        <strong>Nome:</strong>
        {{ $plano->nome }}
    </p>

    <p>
        <strong>Descrição:</strong>
        {{ $plano->descricao }}
    </p>

    <p>
        <strong>Preço:</strong>
        R$ {{ number_format($plano->preco, 2, ',', '.') }}
    </p>

    <p>
        <strong>Duração:</strong>
        {{ $plano->duracao_dias }} dias
    </p>

    <p>
        <strong>Status:</strong>
        {{ $plano->status }}
    </p>

    <br>

    <a href="/planos">
        Voltar
    </a>

    <a href="/planos/{{ $plano->id }}/editar">
        Editar
    </a>

</body>

</html>