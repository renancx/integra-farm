<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lotes vendidos - Integrador</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    @auth
    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/vendidos">Lotes vendidos</a></li>
        </ul>
    </nav>

    <div id="vendidos">
        <h1>Lotes vendidos</h1>
        <table>
            <tr>
                <th>Tamanho do lote</th>
                <th>Data de chegada</th>
                <th>Data de saída</th>
                <th>Observação</th>
            </tr>
            @foreach ($lotes as $lote)
            @if ($lote->vendido_lote == true)
            <tr>
                <td>{{ $lote->tamanho_lote }}</td>
                <td>{{ $lote->chegada_lote }}</td>
                <td>{{ $lote->saida_lote }}</td>
                <td>{{ $lote->observacao_lote }}</td>
            </tr>
            @endif
            @endforeach
        </table>
    </div>


    @else
    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
        </ul>
    </nav>

    @endauth
</body>
</html>