<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ano');
            $table->string('descricao', 255);
            $table->integer('biografia_id')->unsigned()->default(1);
            $table->foreign('biografia_id')->references('id')->on('biografia');
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
        Schema::dropIfExists('anos');
    }
}
