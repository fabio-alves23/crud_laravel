<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Animal; 
use Illuminate\support\Facades\DB;

class Vacinacao extends Model {
    use HasFactory;

    protected $table = 'vacinacaos'; 
    protected $fillable = ['animal_id', 'nome_vacina', 'data'];

    // Cada vacinação pertence a um Animal
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

     
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
        static::deleted(function ($propriedade) {
            // Atualiza a sequência do PostgreSQL
            DB::statement('SELECT setval(\'propriedades_id_seq\', (SELECT COALESCE(MAX(id), 0) FROM propriedades) + 1, false)');
        });
    }
}



