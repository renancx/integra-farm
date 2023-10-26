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
        document.getElementById('page-title').innerHTML = 'Início - Integrador';
    </script>

    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="/vendidos">Lotes vendidos</a></li>
        </ul>
        <div class="navbar-right">
            <form id="logout" action="/logout" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </nav>

    <h1>Hi, {{ auth()->user()->name }}</h1>
    
    <div id="lote-show">
        <h2>Lotes de suínos</h2>
        <div class="lote-list">
            @foreach ($lotes as $lote)
            @if ($lote->vendido_lote == false)
            <div class="lote-item">
                <div class="lote-details">
                    <p><strong>Tamanho do lote:</strong> {{ $lote->tamanho_lote }}</p>
                    <p><strong>Data de chegada:</strong> {{ $lote->chegada_lote }}</p>
                    <p><strong>Data de saída:</strong> {{ $lote->saida_lote }}</p>
                    <p><strong>Observação:</strong> {{ $lote->observacao_lote }}</p>
                </div>
                <div class="lote-actions">
                    <button onclick="showLoteEdit('{{ $lote->id }}')">Editar</button>
                    <button onclick="showLoteSell('{{ $lote->id }}')">Vender</button>
                </div>
                <div id="lote-edit-{{ $lote->id }}" class="lote-edit" style="display: none">
                    <h4>Editar Lote</h4>
                    <form action="/lote-edit/{{ $lote->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="tamanho_lote" placeholder="Tamanho do lote" autocomplete="off" value="{{ $lote->tamanho_lote }}">
                        <input type="date" name="chegada_lote" placeholder="Data de chegada" autocomplete="off" value="{{ $lote->chegada_lote }}">
                        <input type="date" name="saida_lote" placeholder="Data de saída" autocomplete="off" value="{{ $lote->saida_lote }}">
                        <input type="text" name="observacao_lote" placeholder="Observação" autocomplete="off" value="{{ $lote->observacao_lote }}">
                        <button type="submit">Confirmar</button>
                        <button type="button" onclick="hideLoteEdit('{{ $lote->id }}')">Cancelar</button>
                    </form>
                </div>
                <div id="lote-sell-{{ $lote->id }}" class="lote-sell" style="display: none">
                    <h4>Vender Lote</h4>
                    <form action="/lote-sell/{{ $lote->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <p>Data da venda</p>
                        <input type="date" name="saida_lote_venda" placeholder="Data da venda" autocomplete="off" value="{{ date('Y-m-d') }}">
                        <button type="submit">Confirmar</button>
                        <button type="button" onclick="hideLoteSell('{{ $lote->id }}')">Cancelar</button>
                    </form>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>


    <div>
        <button id="lote-button" onclick="showLoteRegister()">Novo lote</button>
    </div>

    <div id="lote-register" style="display: none">
        <h2>Novo lote</h2>
        <form action="/lote" method="POST">
            @csrf
            <input type="number" name="tamanho_lote" placeholder="Tamanho do lote" autocomplete="off">
            <input type="date" name="chegada_lote" placeholder="Data de chegada" autocomplete="off" value="{{ date('Y-m-d') }}">
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
        <form action="/register" method="POST">
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