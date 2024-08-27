<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
<h1>Editar Participante</h1>

<form action="{{ route('participantes.update', $participante->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" value="{{ $participante->nome }}" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $participante->email }}" required>

    <button type="submit">Salvar</button>
</form>
</body>
</html>