<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raca;
use Illuminate\Support\Facades\DB;

class RacaController extends Controller
{
    /**
     * Lista todas as raças.
     */
    public function index()
    {
        $racas = Raca::all();
        return view('racas.index', compact('racas'));
    }

    /**
     * Mostra o formulário para criar uma nova raça.
     */
    public function create()
    {
        return view('racas.create');
    }

    /**
     * Salva uma nova raça, preenchendo automaticamente o menor ID disponível.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        // Descobre o menor ID disponível
        $existingIds = DB::table('racas')->pluck('id')->toArray();
        $nextId = 1;
        while (in_array($nextId, $existingIds)) {
            $nextId++;
        }

        // Insere a nova raça
        DB::table('racas')->insert([
            'id' => $nextId,
            'nome' => $request->nome,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('racas.index')->with('success', 'Raça cadastrada com sucesso!');
    }

    /**
     * Mostra o formulário de edição de uma raça.
     */
    public function edit(Raca $raca)
    {
        return view('racas.edit', compact('raca'));
    }

    /**
     * Atualiza uma raça existente.
     */
    public function update(Request $request, Raca $raca)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $raca->update($request->all());

        return redirect()->route('racas.index')->with('success', 'Raça atualizada com sucesso!');
    }

    /**
     * Remove uma raça.
     */
    public function destroy(Raca $raca)
    {
        $raca->delete();
        return redirect()->route('racas.index')->with('success', 'Raça excluída com sucesso!');
    }
}
