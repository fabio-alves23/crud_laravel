<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Raca;
use App\Models\Propriedade;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    // Lista os animais do usuário logado
    public function index()
    {
        $user = Auth::user();

        $animais = Animal::whereHas('propriedade', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('raca', 'propriedade')->get();

        return view('animais.index', compact('animais'));
    }

    // Formulário para criar novo animal
    public function create()
    {
        $user = Auth::user();
        $racas = Raca::all();
        $propriedades = Propriedade::where('user_id', $user->id)->get();

        return view('animais.create', compact('racas', 'propriedades'));
    }

    // Salvar novo animal
    public function store(Request $request)
    {
        $request->validate([
            'nome_do_animal' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raca_id' => 'required|exists:racas,id',
            'propriedade_id' => 'required|exists:propriedades,id',
            'idade' => 'required|integer|min:0',
            'peso' => 'nullable|numeric|min:0',
        ]);

        Animal::create($request->all());

        return redirect()->route('animais.index')->with('success', 'Animal cadastrado com sucesso!');
    }

    // Formulário para editar animal existente
    public function edit(Animal $animal)
    {
        $user = Auth::user();
        $racas = Raca::all();
        $propriedades = Propriedade::where('user_id', $user->id)->get();

        return view('animais.edit', compact('animal', 'racas', 'propriedades'));
    }

    // Atualizar animal
    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'nome_do_animal' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raca_id' => 'required|exists:racas,id',
            'propriedade_id' => 'required|exists:propriedades,id',
            'idade' => 'required|integer|min:0',
            'peso' => 'nullable|numeric|min:0',
        ]);

        $animal->update($request->all());

        return redirect()->route('animais.index')->with('success', 'Animal atualizado com sucesso!');
    }

    // Deletar animal
    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animais.index')->with('success', 'Animal excluído com sucesso!');
    }
}
