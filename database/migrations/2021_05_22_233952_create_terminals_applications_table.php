<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTerminalsApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terminals_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('terminal_id');
            $table->unsignedBigInteger('application_id');
            $table->date('date_debut');
            $table->date('date_fin');
            $table->timestamps();

            $table->foreign('terminal_id')->references('id')->on('terminals');
            $table->foreign('application_id')->references('id')->on('applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terminals_applications');
    }
}
