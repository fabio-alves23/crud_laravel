<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacinacao extends Model {
    use HasFactory;

    protected $table = 'vacinacaos'; // garante que Eloquent encontre a tabela
    protected $fillable = ['animal_id', 'nome_vacina', 'data'];

   public function animal()
{
    return $this->belongsTo(Animal::class);
}

}

