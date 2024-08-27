<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="/css/editar.css">
    <script src="/js/editar.js" defer></script>
</head>
<body>
    <header>
            <nav>
                <h1>Amigo Secreto 🎁</h1>
                <a id="BtnSorteio" href="{{ route('home') }}">Home</a>
            </nav>
    </header>
    <main>
        <div id="topo">
            <h1>Editar Participante</h1>
        </div>
        <form action="{{ route('participantes.update', $participante->id) }}" method="POST" id="formEdit">
            @csrf
            @method('PUT')
            <div>
                <fieldset>
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" value="{{ $participante->nome }}" required>
                </fieldset>
                <fieldset>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $participante->email }}" required>
                </fieldset>
            </div>
            <div>
                <button type="submit" id="BtnSave">Salvar</button>
                <div id="error-message" style="color: red; display: none;">
                    <p></p>
                </div>
                <div id="success-message" style="color: green; display: none;">
                    <p></p>
                </div>
            </div>
        </form>
    </main>
</body>
</html>