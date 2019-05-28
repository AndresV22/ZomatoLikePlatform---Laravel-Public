<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            // en esta tabla se supone van las llaves foraneas de las tablas
            // usuario y ciudad, no tengo idea como :sss :C
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_users');
    }
}
