<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('sell_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('sell_id')->references('id')->on('sells');
            $table->integer('cantidad');
            $table->double('p_costo')->default(1);
            $table->double('p_costo_usd')->default(1);
            $table->double('p_venta')->default(1);
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
        Schema::dropIfExists('items');
    }
}
