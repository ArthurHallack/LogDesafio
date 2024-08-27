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

}
