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
            $table->increments('id');
            $table->unsignedBigInteger('etat_terminal_id');
            $table->unsignedBigInteger('action_id');
            $table->unsignedBigInteger('parametrage_id');

            $table->timestamps();

            $table->foreign('etat_terminal_id')->references('id')->on('etat_terminals');
            $table->foreign('action_id')->references('id')->on('actions');
            $table->foreign('parametrage_id')->references('id')->on('parametrages');
            $table->softDeletes();
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
