<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionandoRecursosServicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('servicos', function (Blueprint $table) {
            $table->renameColumn('cliente', 'titulo');
            $table->string('resumo');
            $table->string('android');
            $table->string('ios');
            $table->string('github');
            $table->string('externo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('servicos', function (Blueprint $table) {
            $table->renameColumn('titulo', 'cliente');
            $table->dropIfExists('resumo');
            $table->dropIfExists('android');
            $table->dropIfExists('ios');
            $table->dropIfExists('github');
            $table->dropIfExists('externo');
        });
    }
}
