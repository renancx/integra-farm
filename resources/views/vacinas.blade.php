<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integrador - Vacinas</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    @auth
    @include('partials.navbar')
    <div id=vacinados>
        <h1>Lotes vacinados</h1>
    </div>

    @else
    @include('partials.guest')
    <h1>Olá, visitante!</h1>

    @endauth
</body>
</html>