<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="/css/home.css">
    <script src="/js/home.js"></script>
    
</head>
<body>
    <header>
        <nav>
            <h1>Amigo Secreto</h1>
        </nav>
    </header>
    <main>
        <div id="topo">
            <h1>Participantes</h1>
            <div>
                <a href="{{ route('cadastro') }}">Adicionar</a>
                <a href="">Filtrar</a>
            </div>
        </div>

        <div id="confirm-excluir">
            <p>Deseja realmente excluir ?</p>
            <div>
                <button id="excluir">sim</button>
                <button id="negar" onclick="negarMsg()">Não</button>
            </div>
        </div>

        <div id="Container">
            <div id="tabela">
                <div id="hud">
                    <ul>
                        <li id="idHud">ID</li>
                        <li id="nomeHud">Nome</li>
                        <li id="emailHud">Email</li>
                    </ul>
                </div>
                <div id="Conteudo">
                    @foreach($participantes as $participante)
                    <ul>
                        <li class="idParticipante">{{ $participante->id }}</li>
                        <li class="nomeParticipante">{{ $participante->nome }}</li>
                        <li class="emailParticipante">{{ $participante->email }}</li>
                        <li class="BtnsParticipante">
                        <button class="btn-editar" onclick="window.location.href='{{ route('participantes.edit', $participante->id) }}'">Editar</button>

                            <button class="btn-excluir" data-id="" onclick="msgConfirm(this)">Excluir</button>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
            <a id="BtnSorteio" href="{{ route('sorteio') }}">Sortear</a>
        </div>
    </main>
</body>
</html>