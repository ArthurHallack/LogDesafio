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

        return redirect('/Cadastro')->with('success', 'Participante adicionado com sucesso!');
    }

    public function index()
    {
    $participantes = Participante::all(); 

    return view('home', compact('participantes'));
    }

    public function sorteio()
    {
        $participantes = Participante::all();
        $participantes = $participantes->shuffle();      
        // Une em pares
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

    public function edit($id)
    {
        $participante = Participante::findOrFail($id);

        return view('editar', compact('participante'));
    }

    public function update(Request $request, $id)
    {
        // Validar os dados recebidos
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $participante = Participante::findOrFail($id);
        $participante->update($validated);

        // Redirecionar para a página inicial ou outra de sua escolha
        return redirect()->route('home')->with('success', 'Participante atualizado com sucesso!');
    }

    public function filtrar(Request $request)
    {
        $query = Participante::query();

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $participantes = $query->get();

        return view('home', compact('participantes'));
    }

    public function excluir(Request $request, $id)
    {
        if ($request->input('confirmar') === 'true') {

            $participante = Participante::findOrFail($id);
            $participante->delete();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
