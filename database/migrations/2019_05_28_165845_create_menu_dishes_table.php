<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_dishes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('menu_id')->unsigned();
            $table->bigInteger('dish_id')->unsigned();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
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
        Schema::dropIfExists('menu_dishes');
    }
}
