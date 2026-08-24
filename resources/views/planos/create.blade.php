<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar Plano</title>
</head>

<body>

    <h1>Cadastrar Plano</h1>

    @if($errors->any())

    <ul>
        @foreach($errors->all() as $erro)
        <li>{{ $erro }}</li>
        @endforeach
    </ul>

    @endif

    <form action="/planos/cadastrar" method="POST">

        @csrf

        <div>
            <label>Nome:</label>

            <input
                type="text"
                name="nome"
                value="{{ old('nome') }}">
        </div>

        <br>

        <div>
            <label>Descrição:</label>

            <textarea name="descricao">{{ old('descricao') }}</textarea>
        </div>

        <br>

        <div>
            <label>Preço:</label>

            <input
                type="number"
                name="preco"
                step="0.01"
                value="{{ old('preco') }}">
        </div>

        <br>

        <div>
            <label>Duração em dias:</label>

            <input
                type="number"
                name="duracao_dias"
                value="{{ old('duracao_dias') }}">
        </div>

        <br>

        <div>
            <label>Status:</label>

            <select name="status">

                <option value="ativo">
                    Ativo
                </option>

                <option value="inativo">
                    Inativo
                </option>

            </select>
        </div>

        <br>

        <button type="submit">
            Cadastrar
        </button>

    </form>

    <br>

    <a href="/planos">
        Voltar
    </a>

</body>

</html>