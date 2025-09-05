<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('animals', function (Blueprint $table) {
        $table->renameColumn('nome', 'nome_do_animal');
        $table->string('especie')->after('nome_do_animal');
    });
}

public function down(): void
{
    Schema::table('animals', function (Blueprint $table) {
        $table->renameColumn('nome_do_animal', 'nome');
        $table->dropColumn('especie');
    });
}

};
