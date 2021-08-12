<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedSmallInteger('price');
            $table->unsignedSmallInteger('quantity');
            $table->unsignedTinyInteger('featured')->nullable();
            $table->string('image');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->string('model');
            $table->text('description')->nullable();
            $table->string('cpu')->nullable();
            $table->string('cputype')->nullable();
            $table->unsignedTinyInteger('amountofram')->nullable();
            $table->string('typeofram')->nullable();
            $table->float('screensize',3,1)->nullable();
            $table->string('gcard')->nullable();
            $table->string('hdtype')->nullable();
            $table->unsignedSmallInteger('hdcapacity')->nullable();
            $table->float('width',4,1)->nullable();
            $table->float('depth',4,1)->nullable();
            $table->float('height',4,2)->nullable();
            $table->float('weight',2,1)->nullable();
            $table->string('os')->nullable();
            $table->unsignedSmallInteger('releaseyear')->nullable();
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
        Schema::dropIfExists('products');
    }
}
