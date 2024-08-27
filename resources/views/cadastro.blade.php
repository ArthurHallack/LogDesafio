<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro</title>
    <link rel="stylesheet" href="/css/cadastro.css">
    <script src="/js/cadastro.js" defer></script>
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
            <h1>Cadastro</h1>
        </div>
        <form method="POST" action="{{ route('participantes.store') }}" id="formAdd">
            @csrf
            <div id="inputsArea">
                <fieldset>
                    <label for="inputNome">Nome</label>
                    <input type="text" id="inputNome" name="nome" minlength="3" maxlength="15" required>
                </fieldset>
                <fieldset>
                    <label for="inputEmail">Email</label>
                    <input type="text" id="inputEmail" name="email" minlength="12" maxlength="60" required>
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