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
            $table->bigInteger('menus_id')->unsigned();
            $table->bigInteger('dishes_id')->unsigned();
            $table->foreign('menus_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('dishes_id')->references('id')->on('dishes')->onDelete('cascade');
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
