<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('dateNaiss');
            $table->string('lieuNaiss');
            $table->string('profession_occupation');
            $table->string('nomPere');
            $table->string('nomMere');
            $table->string('domicile_residence');
            $table->integer('numCNI');
            $table->string('telephone');
            $table->string('photocni');
            $table->string('photoP');
            $table->integer('commune_id');
            $table->integer('bureau_de_vote_id');
            $table->enum('statut_process', [Constants::SUBMITTEDINSCRIPTION, Constants::REJECTEDINSCRIPTION, Constants::VALIDEINSCRIPTION]); //gestion du processus de son inscription

            // tableau sérialisé qui va contenir le statut(accepté|refué) de chque champ
            $table->text('statut_elements')->nullable();
            $table->string('date_inscription');
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
        Schema::dropIfExists('personnes');
    }
}



/*
   codeP                int not null,
   refCom               varchar(254) not null,
   nom                  varchar(254),
   prenom               varchar(254),
   dateNaiss            date,
   lieuNaiss            varchar(254),
   profession_occupation varchar(254),
   nomPere              varchar(254),
   nomMere              varchar(254),
   domicile_residence   varchar(254),
   numCNI               int,
   tel                  varchar(254),
   photocni             longblob,
   photoP               longblob,
   primary key (codeP)
*/