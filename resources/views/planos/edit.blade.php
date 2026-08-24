<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Plano</title>
</head>

<body>

    <h1>Editar Plano</h1>

    @if($errors->any())

    <ul>
        @foreach($errors->all() as $erro)
        <li>{{ $erro }}</li>
        @endforeach
    </ul>

    @endif

    <form
        action="/planos/{{ $plano->id_encriptado }}/editar"
        method="POST">

        @csrf

        <div>
            <label>Nome:</label>

            <input
                type="text"
                name="nome"
                value="{{ old('nome', $plano->nome) }}">
        </div>

        <br>

        <div>
            <label>Descrição:</label>

            <textarea name="descricao">{{ old('descricao', $plano->descricao) }}</textarea>
        </div>

        <br>

        <div>
            <label>Preço:</label>

            <input
                type="number"
                name="preco"
                step="0.01"
                value="{{ old('preco', $plano->preco) }}">
        </div>

        <br>

        <div>
            <label>Duração em dias:</label>

            <input
                type="number"
                name="duracao_dias"
                value="{{ old('duracao_dias', $plano->duracao_dias) }}">
        </div>

        <br>

        <div>
            <label>Status:</label>

            <select name="status">

                <option
                    value="ativo"
                    @selected($plano->status == 'ativo')
                    >
                    Ativo
                </option>

                <option
                    value="inativo"
                    @selected($plano->status == 'inativo')
                    >
                    Inativo
                </option>

            </select>
        </div>

        <br>

        <button type="submit">
            Atualizar
        </button>

    </form>

    <br>

    <a href="/planos">
        Voltar
    </a>

</body>

</html>