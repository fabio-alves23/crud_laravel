<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('propriedades', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('localizacao');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('propriedades');
    }
};
