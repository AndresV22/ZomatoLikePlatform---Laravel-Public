<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities_users', function (Blueprint $table) {
            $table->bigInteger('cities_id')->unsigned()->nullable();
            $table->bigInteger('users_id')->unsigned()->nullable();
            $table->foreign('cities_id')->references('id')->on('cities');
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('cities_users');
    }
}
