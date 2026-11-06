<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Ficha do aluno</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #222;
        }

        .header {
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #0d6efd;
            font-size: 24px;
            margin: 0;
        }

        .header .sub {
            color: #777;
            margin-top: 4px;
        }

        h2 {
            font-size: 15px;
            margin: 24px 0 8px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .label {
            width: 30%;
            color: #777;
        }

        .footer {
            margin-top: 40px;
            font-size: 11px;
            color: #999;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>Fitly</h1>
        <div class="sub">Ficha de matrícula do aluno</div>
    </div>

    <h2>Dados pessoais</h2>

    <table>
        <tr>
            <td class="label">Nome</td>
            <td>{{ $aluno->nome }}</td>
        </tr>
        <tr>
            <td class="label">E-mail</td>
            <td>{{ $aluno->email }}</td>
        </tr>
        <tr>
            <td class="label">Telefone</td>
            <td>{{ $aluno->telefone }}</td>
        </tr>
        <tr>
            <td class="label">Data de nascimento</td>
            <td>{{ $aluno->data_nascimento->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td class="label">Objetivo</td>
            <td>{{ $aluno->objetivo }}</td>
        </tr>
    </table>

    <h2>Plano contratado</h2>

    <table>
        <tr>
            <td class="label">Plano</td>
            <td>{{ $aluno->plano->nome }}</td>
        </tr>
        <tr>
            <td class="label">Valor</td>
            <td>R$ {{ number_format($aluno->plano->preco, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td class="label">Duração</td>
            <td>{{ $aluno->plano->duracao_dias }} dias</td>
        </tr>
        <tr>
            <td class="label">Cadastro</td>
            <td>{{ $aluno->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <td class="label">Vigência até</td>
            <td>{{ $aluno->created_at->copy()->addDays($aluno->plano->duracao_dias)->format('d/m/Y') }}</td>
        </tr>
    </table>

    <div class="footer">
        Documento gerado em {{ now()->format('d/m/Y H:i') }} - Fitly
    </div>

</body>

</html>