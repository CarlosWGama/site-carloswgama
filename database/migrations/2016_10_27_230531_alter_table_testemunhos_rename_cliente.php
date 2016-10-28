<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableTestemunhosRenameCliente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testemunhos', function (Blueprint $table) {
            $table->renameColumn('cliente', 'nome');
            $table->string('cargo', 100)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testemunhos', function (Blueprint $table) {
            $table->renameColumn('nome', 'cliente');
            $table->string('cargo', 100)->change();
        });
    }
}
