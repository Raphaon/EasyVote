<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarteDeVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carte_de_votes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('imgRecto')->nullable();
            $table->string('imgVerso')->nullable();
            $table->string('dateDeliv');
            $table->enum('statut',['0','1']);
            $table->integer('electeur_id');
            $table->enum('statutCarte', [Constants::CARDNOTAVAILABLE, Constants::CARDAVAILABLE, Constants::CARDREMOVED]);
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
        Schema::dropIfExists('carte_de_votes');
    }
}
