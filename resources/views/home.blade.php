<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/home.css">
    <script src="/js/home.js"></script>
</head>
<body>
    @auth
    <h1>Hi, {{ auth()->user()->name }}</h1>
    <form id="logout" action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
    
    <div id="lote-show">
        <h2>Lotes do usuário</h2>

    </div>

    <div id="lote-register">
        <h2>Novo lote</h2>
        <form action="/lote" method="POST" style = "display: flex; flex-direction: column; align-items: center;">
            @csrf
            <input type="number" name="tamanho_lote" placeholder="Tamanho do lote" autocomplete="off">
            <input type="date" name="chegada_lote" placeholder="Data de chegada" autocomplete="off">
            <input type="date" name="saida_lote" placeholder="Data de saída" autocomplete="off">
            <input type="text" name="observacao_lote" placeholder="Observação" autocomplete="off">
            <button type="submit">Cadastrar</button>
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