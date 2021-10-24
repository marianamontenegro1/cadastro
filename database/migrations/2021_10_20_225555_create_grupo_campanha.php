<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoCampanha extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_campanha', function (Blueprint $table) {
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->unsignedBigInteger('campanha_id');
            $table->foreign('campanha_id')->references('id')->on('campanhas')->onDelete('cascade');
            $table->primary(['grupo_id', 'campanha_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_campanha');
    }
}
