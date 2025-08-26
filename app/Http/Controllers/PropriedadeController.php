<?php

namespace App\Http\Controllers;

use App\Models\Propriedade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropriedadeController extends Controller
{
    //Lista todas as propriedades
     
    public function index()
    {
        $propriedades = Propriedade::all();
        return view('propriedades.index', compact('propriedades'));
    }

    //Mostra o formulário de criação
    public function create()
    {
        return view('propriedades.create');
    }

    
      //Salva uma nova propriedade preenchendo o menor ID disponível
     
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'localizacao' => 'required|string|max:255',
        ]);

        // Descobre o menor ID disponível
        $existingIds = DB::table('propriedades')->pluck('id')->toArray();
        $nextId = 1;
        while (in_array($nextId, $existingIds)) {
            $nextId++;
        }

        // Insere a nova propriedade
        DB::table('propriedades')->insert([
            'id' => $nextId,
            'nome' => $request->nome,
            'localizacao' => $request->localizacao,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('propriedades.index')
                         ->with('success', 'Propriedade cadastrada com sucesso!');
    }

    //Mostra o formulário de edição
    
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

        $propriedade->update($request->all());

        return redirect()->route('propriedades.index')
                         ->with('success', 'Propriedade atualizada com sucesso!');
    }

    
      //Exclui uma propriedade
    
    public function destroy(Propriedade $propriedade)
    {
        $propriedade->delete();

        return redirect()->route('propriedades.index')
                         ->with('success', 'Propriedade excluída com sucesso!');
    }
}
