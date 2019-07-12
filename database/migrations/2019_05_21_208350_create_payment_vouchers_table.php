<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('payment_method_id')->unsigned();
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->integer('amount');
            $table->date('date');
            $table->string('detail', 40);
            $table->integer('status');
            $table->boolean('delivery');
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
        Schema::dropIfExists('payment_vouchers');
    }
}
