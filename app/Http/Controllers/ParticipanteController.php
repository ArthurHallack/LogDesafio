<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participante;

class ParticipanteController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:participantes,email',
        ]);

        // Criação do novo participante
        Participante::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
        ]);

        // Redirecionar ou retornar uma resposta
        return redirect('/Cadastro')->with('success', 'Participante adicionado com sucesso!');
    }

    public function index()
    {
    $participantes = Participante::all(); // Obtém todos os participantes

    return view('home', compact('participantes')); // Passa os participantes para a view
    }

    public function sorteio()
    {
        // Buscar todos os participantes
        $participantes = Participante::all();
        
        // Embaralhar a lista de participantes
        $participantes = $participantes->shuffle();
        
        // Unir participantes em pares
        $pares = [];
        for ($i = 0; $i < count($participantes); $i += 2) {
            if (isset($participantes[$i + 1])) {
                $pares[] = [$participantes[$i], $participantes[$i + 1]];
            } else {
                // Caso ímpar, o último participante ficará sem par
                $pares[] = [$participantes[$i], null];
            }
        }

        // Retornar a view com os pares
        return view('sorteio', ['pares' => $pares]);
    }

    // app/Http/Controllers/ParticipanteController.php

    public function edit($id)
    {
        // Buscar o participante pelo ID
        $participante = Participante::findOrFail($id);

        // Retornar a view de edição com os dados do participante
        return view('editar', compact('participante'));
    }

    // app/Http/Controllers/ParticipanteController.php

public function update(Request $request, $id)
{
    // Validar os dados recebidos
    $validated = $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    // Buscar o participante e atualizar os dados
    $participante = Participante::findOrFail($id);
    $participante->update($validated);

    // Redirecionar para a página inicial ou outra de sua escolha
    return redirect()->route('home')->with('success', 'Participante atualizado com sucesso!');
}



}
