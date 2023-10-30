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
    
    @else
    @include('partials.guest')

    @endauth
</body>
</html>