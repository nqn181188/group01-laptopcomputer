<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->string('ordernumber',);
            // $table->foreign('ordernumber')->cascadeOnDelete()->references('ordernumber')->on('orders');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedSmallInteger('price');
            $table->unsignedTinyInteger('quantity');
            $table->string('shipfirstname');
            $table->string('shiplastname');
            $table->string('shipemail');
            $table->string('shipphone');
            $table->string('shipaddress');
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
        Schema::dropIfExists('order_details');
    }
}
