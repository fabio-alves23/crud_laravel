<?php

namespace App\Http\Controllers;

use App\Models\Propriedade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropriedadeController extends Controller
{
    // Lista todas as propriedades do usuário logado
    public function index()
    {
        $propriedades = Propriedade::where('user_id', Auth::id())->get();
        return view('propriedades.index', compact('propriedades'));
    }

    // Mostra o formulário de criação
    public function create()
    {
        return view('propriedades.create');
    }

    // Salva uma nova propriedade
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'localizacao' => 'required|string|max:255',
        ]);

        // Cria a propriedade usando Eloquent e preenchendo o user_id
        Propriedade::create([
            'nome' => $request->nome,
            'localizacao' => $request->localizacao,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('propriedades.index')
                         ->with('success', 'Propriedade cadastrada com sucesso!');
    }

    // Mostra o formulário de edição
    public function edit(Propriedade $propriedade)
    {
        return view('propriedades.edit', compact('propriedade'));
    }

    // Atualiza uma propriedade existente
    public function update(Request $request, Propriedade $propriedade)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'localizacao' => 'required|string|max:255',
        ]);

        // Atualiza apenas os campos necessários (não altera user_id)
        $propriedade->update([
            'nome' => $request->nome,
            'localizacao' => $request->localizacao,
        ]);

        return redirect()->route('propriedades.index')
                         ->with('success', 'Propriedade atualizada com sucesso!');
    }

    // Exclui uma propriedade
    public function destroy(Propriedade $propriedade)
    {
        $propriedade->delete();

        return redirect()->route('propriedades.index')
                         ->with('success', 'Propriedade excluída com sucesso!');
    }
}
