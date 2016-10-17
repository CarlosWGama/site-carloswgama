<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableRedesSociaisFieldLink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('redes_sociais', function (Blueprint $table) {
            $table->renameColumn('nome', 'link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('redes_sociais', function (Blueprint $table) {
            $table->renameColumn('link', 'nome');
        });
    }
}
