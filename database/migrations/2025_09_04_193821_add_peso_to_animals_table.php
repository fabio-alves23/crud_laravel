<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPesoToAnimalsTable extends Migration
{
    public function up()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->float('peso')->nullable()->after('idade'); // adiciona o campo peso como float, nullable
        });
    }

    public function down()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropColumn('peso');
        });
    }
}
