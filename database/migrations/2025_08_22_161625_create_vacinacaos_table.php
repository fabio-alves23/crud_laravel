<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Criar tabela primeiro
        Schema::create('vacinacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->string('nome_vacina');
            $table->date('data');
            $table->timestamps();
        });

        // Depois, adiciona a foreign key
        Schema::table('vacinacaos', function (Blueprint $table) {
            $table->foreign('animal_id')->references('id')->on('animals')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::table('vacinacaos', function (Blueprint $table) {
            $table->dropForeign(['animal_id']);
        });
        Schema::dropIfExists('vacinacaos');
    }
};
