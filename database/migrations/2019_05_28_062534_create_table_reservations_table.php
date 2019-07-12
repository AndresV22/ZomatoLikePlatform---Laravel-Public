<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->bigInteger('table_id')->unsigned();
            $table->bigInteger('reservation_id')->unsigned();
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_reservations');
    }
}
