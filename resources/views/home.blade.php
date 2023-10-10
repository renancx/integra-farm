<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
    <h1>Hi, {{ auth()->user()->name }}</h1>
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <p>Manage your property with this awesome app</p>
    
    @else
    <div id="register" style="border: 1px solid black; padding: 10px; margin: 10px; text-align: center;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name" autocomplete="off"><br>
            <input type="text" name="cpf" placeholder="CPF" autocomplete="off"><br>
            <input type="email" name="email" placeholder="Email" autocomplete="off"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="text" name="city" placeholder="City" autocomplete="off"><br>
            <button type="submit">Register</button>
        </form>
    </div>

    <div id="login" style="border: 1px solid black; padding: 10px; margin: 10px; text-align: center;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="email" name="login_email" placeholder="Email" autocomplete="off"><br>
            <input type="password" name="login_password" placeholder="Password"><br>
            <button type="submit">Login</button>
        </form>
    </div>
    @endauth
</body>
</html>