<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Raca;
use App\Models\Propriedade;

class AnimalController extends Controller
{
    public function index()
    {
        $animais = Animal::all();
        return view('animais.index', compact('animais'));
    }

    public function create()
    {
        $racas = Raca::all();
        $propriedades = Propriedade::all();
        return view('animais.create', compact('racas', 'propriedades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'raca_id' => 'required|exists:racas,id',
            'propriedade_id' => 'required|exists:propriedades,id',
            'idade' => 'required|integer|min:0'
        ]);

        Animal::create($request->all());
        return redirect()->route('animais.index')->with('success', 'Animal cadastrado com sucesso!');
    }

    public function edit(Animal $animal)
    {
        $racas = Raca::all();
        $propriedades = Propriedade::all();
        return view('animais.edit', compact('animal', 'racas', 'propriedades'));
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'raca_id' => 'required|exists:racas,id',
            'propriedade_id' => 'required|exists:propriedades,id',
            'idade' => 'required|integer|min:0'
        ]);

        $animal->update($request->all());
        return redirect()->route('animais.index')->with('success', 'Animal atualizado com sucesso!');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();
        return redirect()->route('animais.index')->with('success', 'Animal excluído com sucesso!');
    }
}
