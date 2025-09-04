<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->foreignId('raca')->constrained('racas')->onDelete('cascade');
            $table->foreignId('propriedade')->constrained('propriedades')->onDelete('cascade');
            $table->integer('idade')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('animals');
    }
};
