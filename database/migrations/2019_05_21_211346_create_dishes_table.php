<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('purchase_id')->unsigned();
            $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
            $table->string('name', 32);
            $table->integer('price');
            $table->text('description');
            $table->string('category', 20);
            $table->integer('discount');
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
        Schema::dropIfExists('dishes');
    }
}
