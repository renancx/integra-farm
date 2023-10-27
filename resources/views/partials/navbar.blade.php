<nav>
    <ul>
        <li><a href="/">Inicio</a></li>
        <li><a href="/vacinas">Gerenciar vacinas</a></li>
        <li><a href="/vendidos">Lotes vendidos</a></li>
    </ul>
    <div class="navbar-right">
        <form id="logout" action="/logout" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</nav>