<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
   Schema::create('animals', function (Blueprint $table) {
    $table->id();
    $table->string('nome_do_animal');
    $table->string('especie'); // nova coluna para espécie
    $table->foreignId('raca_id')->constrained('racas')->onDelete('cascade');
    $table->foreignId('propriedade_id')->constrained('propriedades')->onDelete('cascade');
    $table->integer('idade')->nullable();
    $table->decimal('peso', 8, 2)->nullable();
    $table->timestamps();
});

    }

    public function down(): void {
        Schema::dropIfExists('animals');
    }
};
