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
        document.getElementById('page-title').innerHTML = 'Integrador';
    </script>

    @include('partials.navbar')

    <h1>Hi, {{ auth()->user()->name }}</h1>
    
    <div id="lote-show">
        <h2>Lotes de suínos</h2>
        <div class="lote-list">
            @foreach ($lotes as $lote)
            @if ($lote->vendido_lote == false)
            <div class="lote-item">

                {{-- TODO: Mudar comentários html para blade --}}
                {{-- <p>{{ $lote->id }}</p> --}}
                <!-- Botão para visualizar as vacinas aplicadas nesse lote-->
                <button onclick="showVacinas('{{ $lote->id }}')" id="vacina-button-{{ $lote->id }}">Vacinas aplicadas</button>

                <div class="vacina-list" id="vacina-list-{{ $lote->id }}" style="display: none">
                    <h4>Vacinas aplicadas</h4>
                    <table>
                        <tr>
                            <th>Vacina</th>
                            <th>Data de aplicação</th>
                            <th>Doses</th>
                        </tr>
                        @foreach ($lote->vacinas as $vacina)
                        <tr>
                            <td>{{ $vacina->nome_vacina }}</td>
                            <td>{{ $vacina->data_aplicacao }}</td>
                            <td>{{ $vacina->doses_vacina }}</td>
                        </tr>
                        @endforeach
                    </table>

                    <button onclick="registerVacina('{{ $lote->id }}')">Nova vacina</button>
                    <div id="new-vacina-{{ $lote->id }}" style="display: none">
                        <h4>Nova vacina</h4>

                        <form action="/vacina" method="POST">
                            @csrf
                            <input type="radio" name="nome_vacina" value="Peste Suína Clássica (PSC)">Peste Suína Clássica (PSC)
                            <input type="radio" name="nome_vacina" value="Cólera Suína (CS)">Cólera Suína (CS)
                            <input type="radio" name="nome_vacina" value="Diarreia Epidêmica Suína (DES)">Diarreia Epidêmica Suína (DES)

                            <input type="radio" name="nome_vacina" value="outra" id="outra-vacina-{{ $lote->id }}">Outra
                            <input type="text" name="outra_vacina" autocomplete="off" id="outra-vacina-input-{{ $lote->id }}" style="display: none">

                            <script>
                               const outraRadio = document.getElementById("outra-vacina-{{ $lote->id }}");
                                const outraVacinaInput = document.getElementById("outra-vacina-input-{{ $lote->id }}");

                                outraRadio.addEventListener("change", function() {
                                    if (outraRadio.checked) {
                                        outraVacinaInput.style.display = "block";
                                    } else {
                                        outraVacinaInput.style.display = "none";
                                    }
                                });

                                const radios = document.querySelectorAll('input[type="radio"][name="nome_vacina"]');
                                radios.forEach(function(radio) {
                                    if (radio.value !== "outra") {
                                        radio.addEventListener("change", function() {
                                            outraVacinaInput.style.display = "none";
                                        });
                                    }
                                });
                            </script>

                            <input type="date" name="data_aplicacao" placeholder="Data de aplicação" autocomplete="off" value="{{ date('Y-m-d') }}">
                            <input type="number" name="doses_vacina" placeholder="Doses" autocomplete="off">
                            <input type="hidden" name="lote_id" value="{{ $lote->id }}">
                            <button type="submit">Cadastrar</button>
                            <button id="vacina-register-button-{{ $lote->id }}" type="button" onclick="hideRegisterVacinas('{{ $lote->id }}')">Cancelar</button>
                        </form>
                    </div>

                    <button onclick="hideVacinas('{{ $lote->id }}')">Fechar</button>
                </div>

                <div class="lote-details">
                    <p><strong>Tamanho do lote:</strong> {{ $lote->tamanho_lote }}</p>
                    <p><strong>Chegada:</strong> {{ $lote->chegada_lote }}</p>
                    <p><strong>Saída:</strong> {{ $lote->saida_lote }}</p>
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
    <h1 id="title">Integrador</h1>
    <p id="subtitle">Simplifique a gestão de sua fazenda e potencialize seus resultados</p>
    <p id="subtitle">Faça login ou registre-se para começar</p>

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

    <div class="container" dysplay="clickable">
        <div class="cont">
            <div class="left" onclick="changeDescription(1)">
                <h3>A sua fazenda sob controle</h3>
            </div>
            <div class="left" onclick="changeDescription(2)">
                <h3>Mantenha o controle de seus lotes</h3>
            </div>
            <div class="left" onclick="changeDescription(3)">
                <h3>Tenha o controle de vendas</h3>
            </div>
            <div class="left" onclick="changeDescription(4)">
                <h3>Gerenciador de vacinas</h3>
            </div>
        </div>

        <div class="right" id="description">
        <p>Selecione um título à esquerda para ver a descrição correspondente aqui.</p>
        </div>
    </div>

    @endauth
</body>
</html>