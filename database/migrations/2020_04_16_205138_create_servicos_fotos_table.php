<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicosFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos_fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('arquivo')->nullable();
            $table->unsignedInteger('servico_id');
            $table->foreign('servico_id')->references('id')->on('servicos');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos_fotos');
    }
}
