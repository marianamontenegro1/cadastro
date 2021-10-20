<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('campanha_id');
            $table->foreign('campanha_id')->references('id')->on('campanhas');
            $table->unsignedBigInteger('desconto_id');
            $table->foreign('desconto_id')->references('id')->on('descontos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign(['campanha_id', 'desconto_id']);
            $table->dropColumn(['campanha_id', 'desconto_id']);
        });
    }
}
