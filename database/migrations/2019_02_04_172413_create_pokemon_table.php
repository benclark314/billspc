<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::rename('pokemon', 'nomekop');
        Schema::create('pokemon', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pokemonName');
            $table->float('height', 8, 4);
            $table->float('weight', 8, 4);
            $table->string('genus');
            $table->mediumText('description');
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
        Schema::dropIfExists('pokemon');
    }
}
