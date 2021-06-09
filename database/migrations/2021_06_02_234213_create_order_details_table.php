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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id'); //foreignkey order
            $table->unsignedBigInteger('product_id'); //foreignkey produk
            $table->integer('price'); //membuat salinan harga, untuk menghindari perubahan data produk
            $table->integer('qty');
            $table->integer('weight'); //membuat salinan bobot, untuk menghindari perubahan data produk
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
