<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteio</title>
</head>
<body>
    <header>
        <nav>
            <h1>Amigo Secreto</h1>
        </nav>
    </header>
    <main>
    <h1>Resultado do Sorteio de Amigo Secreto</h1>
    
    @if(!empty($pares))
        <ul>
            @foreach($pares as $par)
                <li>
                    @if($par[1])
                        {{ $par[0]->nome }} está sorteado para {{ $par[1]->nome }}
                    @else
                        {{ $par[0]->nome }} não tem par
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>Não há participantes para o sorteio.</p>
    @endif
    </main>
</body>
</html>