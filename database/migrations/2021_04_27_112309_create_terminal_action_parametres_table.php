<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminalActionParametresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminal_action_parametres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_etat_terminal');
            $table->foreign('id_etat_terminal')->references('id')->on('etat_terminals');
            $table->unsignedBigInteger('id_parametre');
            $table->foreign('id_parametre')->references('id')->on('parametrages');
            $table->unsignedBigInteger('id_action');
            $table->foreign('id_action')->references('id')->on('actions');
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
        Schema::dropIfExists('terminal_action_parametres');
    }
}
