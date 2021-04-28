<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_departements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_departement');
            $table->foreign('id_departement')->references('id')->on('departements');
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
        Schema::dropIfExists('user_departements');
    }
}
