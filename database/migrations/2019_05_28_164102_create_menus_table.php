<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('premises_id')->unsigned();
            $table->bigInteger('purchases_id')->unsigned();
            $table->foreign('premises_id')->references('id')->on('places');
            $table->foreign('purchases_id')->references('id')->on('purchases');
            $table->timestamps();
            $table->integer('price');
            $table->integer('discount');
            $table->string('category', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
