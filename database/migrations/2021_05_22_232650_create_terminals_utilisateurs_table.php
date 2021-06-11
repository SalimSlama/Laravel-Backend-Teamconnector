<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminalsUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminals_utilisateurs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('terminal_id');
            $table->unsignedBigInteger('utilisateur_id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps();

            $table->foreign('terminal_id')->references('id')->on('terminals');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terminals_utilisateurs');
    }
}
