<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfusaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfusaos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

	    $table->integer('historico_id');
	    $table->foreign('historico_id')->references('id')->on('historicos')->onDelete('cascade');
	    $table->date('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfusaos');
    }
}
