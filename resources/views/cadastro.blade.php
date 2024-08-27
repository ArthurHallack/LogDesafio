<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cadastro</title>
    <link rel="stylesheet" href="/css/cadastro.css">
    <script src="/js/cadastro.js"></script>
</head>
<body>
<form method="POST" action="{{ route('participantes.store') }}" id="formAdd">
    @csrf
    <div id="inputsArea">
        <fieldset>
            <label for="inputNome">Nome</label>
            <input type="text" id="inputNome" name="nome" required>
        </fieldset>
        <fieldset>
            <label for="inputEmail">Email</label>
            <input type="text" id="inputEmail" name="email" required>
        </fieldset>
    </div>
    <div>
        <button type="submit">Salvar</button>
    </div>
</form>

</body>
</html>