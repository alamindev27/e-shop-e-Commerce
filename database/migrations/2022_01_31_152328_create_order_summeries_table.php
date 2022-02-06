<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSummeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_summeries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('coupon_name')->nullable();
            $table->integer('cart_total');
            $table->integer('discount_total');
            $table->integer('shiping');
            $table->integer('total');
            $table->integer('payment')->comment('1=COD / 2=online');
            $table->integer('payment_status')->default(2)->comment('1=paid / 2=unpaid');
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
        Schema::dropIfExists('order_summeries');
    }
}
