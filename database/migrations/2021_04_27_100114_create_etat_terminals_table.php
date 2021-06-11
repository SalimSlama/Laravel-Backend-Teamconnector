<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatTerminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etat_terminals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Android_id');
            $table->string('NiveauDeBatterie')->nullable();
            $table->string('Memoire')->nullable();
            $table->string('Lattitude')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Fabriquant')->nullable();
            $table->string('Modele')->nullable();
            $table->string('VersionSE')->nullable();
            //$table->string('valeur')->nullable();
            //$table->dateTime('dates')->nullable();
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
        Schema::dropIfExists('etat_terminals');
    }
}
