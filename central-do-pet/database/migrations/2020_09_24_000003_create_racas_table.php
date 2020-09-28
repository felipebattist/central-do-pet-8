<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('racas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

	    $table->integer('pet_id');
	    $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
	    $table->char('especie',50);
	    $table->char('porte',20);
	    $table->char('cor',30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('racas');
    }
}
