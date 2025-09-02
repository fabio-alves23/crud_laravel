<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacinacao;
use App\Models\Animal;

class VacinacaoController extends Controller
{
    // Listar vacinações
    public function index()
    {
        $vacinacoes = Vacinacao::with('animal')->get();
        return view('vacinacoes.index', compact('vacinacoes'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        $animais = Animal::all();
        return view('vacinacoes.create', compact('animais'));
    }

    // Salvar nova vacinação
    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'nome_vacina' => 'required|string|max:255',
            'data_aplicacao' => 'required|date',
        ]);

        Vacinacao::create([
            'animal_id'      => $request->animal_id,
            'nome_vacina'    => $request->nome_vacina,
            'data_aplicacao' => $request->data_aplicacao, 
        ]);

        return redirect()->route('vacinacoes.index')
                         ->with('success', 'Vacinação cadastrada com sucesso!');
    }

    // Mostrar formulário de edição
    public function edit(Vacinacao $vacinacao)
    {
        $animais = Animal::all();
        return view('vacinacoes.edit', compact('vacinacao', 'animais'));
    }

    // Atualizar vacinação
    public function update(Request $request, Vacinacao $vacinacao)
    {
        $request->validate([
            'animal_id' => 'required|exists:animals,id',
            'nome_vacina' => 'required|string|max:255',
            'data_aplicacao' => 'required|date',
        ]);

        $vacinacao->update([
            'animal_id'      => $request->animal_id,
            'nome_vacina'    => $request->nome_vacina,
            'data_aplicacao' => $request->data_aplicacao, 
        ]);

        return redirect()->route('vacinacoes.index')
                         ->with('success', 'Vacinação atualizada com sucesso!');
    }

    // Excluir vacinação
    public function destroy(Vacinacao $vacinacao)
    {
        $vacinacao->delete();

        return redirect()->route('vacinacoes.index')
                         ->with('success', 'Vacinação excluída com sucesso!');
    }
}
