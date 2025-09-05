<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animals'; // força a usar a tabela certa

   protected $fillable = ['nome_do_animal', 'especie', 'raca_id', 'propriedade_id', 'idade', 'peso'];


    // Boot do model para adicionar eventos
    protected static function booted()
    {
        // Evento que dispara ao criar um registro
        static::creating(function ($model) {
            // Pega o menor ID disponível
            $nextId = DB::table($model->getTable())
                ->selectRaw('COALESCE(MIN(id)+1, 1) AS next_id')
                ->whereRaw('id + 1 NOT IN (SELECT id FROM '.$model->getTable().')')
                ->value('next_id');

            $model->id = $nextId ?: 1;
        });

        // Evento que dispara após exclusão de um registro
        static::deleted(function ($animal) {
            // Atualiza a sequência do PostgreSQL
            DB::statement('SELECT setval(\'animals_id_seq\', (SELECT COALESCE(MAX(id), 0) FROM animals) + 1, false)');
        });
    }   

    public function raca()
    {
        return $this->belongsTo(Raca::class);
    }

    public function propriedade()
    {
        return $this->belongsTo(Propriedade::class);
    }

    
}
