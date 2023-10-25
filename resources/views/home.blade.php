<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="page-title">Integrador - Gerenciador de Fazendas</title>
    <link rel="stylesheet" href="/css/home.css">
    <script src="/js/home.js"></script>
    <!-- Favicon color: #285 -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
    @auth
    <script>
        document.getElementById('page-title').innerHTML = 'Inicio - Integrador';
    </script>

    <h1>Hi, {{ auth()->user()->name }}</h1>
    <form id="logout" action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    
    <div id="lote-show" style="border: 1px solid black; padding: 10px;">
        <h2>Lotes de suínos</h2>
        <table>
            <tr>
                <th>Tamanho do lote</th>
                <th>Data de chegada</th>
                <th>Data de saída</th>
                <th>Observação</th>
                <th>Editar</th>
            </tr>
            @foreach ($lotes as $lote)
            @if ($lote->vendido_lote == false)
            <tr>
                <td>{{ $lote->tamanho_lote }}</td>
                <td>{{ $lote->chegada_lote }}</td>
                <td>{{ $lote->saida_lote }}</td>
                <td>{{ $lote->observacao_lote }}</td>
                <td>
                    <div id="lote-edit-{{ $lote->id }}" style="display: none">
                        <h2>Editar lote</h2>
                        <form action="/lote-edit/{{ $lote->id }}" method="POST" style = "display: flex; flex-direction: column; align-items: center;">
                            @csrf
                            @method('PUT')
                            <input type="number" name="tamanho_lote" placeholder="Tamanho do lote" autocomplete="off">
                            <input type="date" name="chegada_lote" placeholder="Data de chegada" autocomplete="off">
                            <input type="date" name="saida_lote" placeholder="Data de saída" autocomplete="off">
                            <input type="text" name="observacao_lote" placeholder="Observação" autocomplete="off">
                            <button type="submit">Confirmar</button>
                            <button type="button" onclick="hideLoteEdit('{{ $lote->id }}')">Cancelar</button>
                        </form>
                    </div>
                    <button class="popup-button" id="lote-edit-button" onclick="showLoteEdit('{{ $lote->id }}')">Editar</button>
                </td>
            </tr>
            @endif
            @endforeach
        </table>
    </div>

    <div>
        <button id="lote-button" onclick="showLoteRegister()">Novo lote</button>
    </div>

    <div id="lote-register" style="display: none">
        <h2>Novo lote</h2>
        <form action="/lote" method="POST" style = "display: flex; flex-direction: column; align-items: center;">
            @csrf
            <input type="number" name="tamanho_lote" placeholder="Tamanho do lote" autocomplete="off">
            <input type="date" name="chegada_lote" placeholder="Data de chegada" autocomplete="off">
            <input type="date" name="saida_lote" placeholder="Data de saída" autocomplete="off">
            <input type="text" name="observacao_lote" placeholder="Observação" autocomplete="off">
            <button type="submit">Cadastrar</button>
            <button type="button" onclick="hideLoteRegister()">Cancelar</button>
        </form>
    </div>

    @else
    <h1 id="title">Welcome to the website</h1>
    <div>
        <button onclick="showRegister()">Register</button>
        <button onclick="showLogin()">Log in</button>
    </div>

    <div id="register" style="display: none">
        <h2>Register</h2>
        <form action="/register" method="POST" style = "display: flex; flex-direction: column; align-items: center;">
            @csrf
            <input type="text" name="name" placeholder="Name" autocomplete="off">
            <input type="text" name="cpf" placeholder="CPF" autocomplete="off">
            <input type="email" name="email" placeholder="Email" autocomplete="off">
            <input type="password" name="password" placeholder="Password">
            <input type="text" name="city" placeholder="City" autocomplete="off">
            <button type="submit">Register</button>
        </form>
    </div>

    <div id="login" style="display: none">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="email" name="login_email" placeholder="Email" autocomplete="off">
            <input type="password" name="login_password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
    @endauth
</body>
</html>