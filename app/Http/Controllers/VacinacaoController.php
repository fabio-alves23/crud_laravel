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
        return view('vacinacaos.index', compact('vacinacoes'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        $animais = Animal::all();
        return view('vacinacaos.create', compact('animais'));
    }

    // Salvar nova vacinação
    public function store(Request $request)
    {
        $request->validate([
            'animal_id' => 'required|exists:animais,id',
            'nome_vacina' => 'required|string|max:255',
            'data_aplicacao' => 'required|date',
        ]);

        Vacinacao::create($request->all());

        return redirect()->route('vacinacoes.index')->with('success', 'Vacinação cadastrada com sucesso!');
    }

    // Mostrar formulário de edição
    public function edit(Vacinacao $vacinacao)
    {
        $animais = Animal::all();
        return view('vacinacaos.edit', compact('vacinacao', 'animais'));
    }

    // Atualizar vacinação
    public function update(Request $request, Vacinacao $vacinacao)
    {
        $request->validate([
            'animal_id' => 'required|exists:animais,id',
            'nome_vacina' => 'required|string|max:255',
            'data_aplicacao' => 'required|date',
        ]);

        $vacinacao->update($request->all());

        return redirect()->route('vacinacoes.index')->with('success', 'Vacinação atualizada com sucesso!');
    }

    // Excluir vacinação
    public function destroy(Vacinacao $vacinacao)
    {
        $vacinacao->delete();
        return redirect()->route('vacinacoes.index')->with('success', 'Vacinação excluída com sucesso!');
    }
}
