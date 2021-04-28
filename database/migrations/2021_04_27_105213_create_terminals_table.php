<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminals', function (Blueprint $table) {
            $table->id();
            $table->string('NomTerminal');
            $table->string('TerminalID');
            $table->String('NiveauDeBatterie');
            $table->string('Memoire');
            $table->string('Lattitude');
            $table->string('Longitude');
            $table->string('Fabriquant');
            $table->string('Modele');
            $table->string('VersionSE');
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
        Schema::dropIfExists('terminals');
    }
}
