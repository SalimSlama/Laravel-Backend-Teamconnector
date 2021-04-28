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
            $table->id();
            $table->unsignedBigInteger('nom_etat');
            $table->foreign('nom_etat')->references('id')->on('type_etats');
            $table->string('valeur');
            $table->string('date_time');
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
