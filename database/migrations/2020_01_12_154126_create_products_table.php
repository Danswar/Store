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
            $table->bigIncrements('id');
            $table->integer('codigo')->unsigned()->unique()->nullable();
            $table->string('nombre');
            $table->integer('stock')->nullable()->default(1);
            $table->integer('stock_min')->nullable();
            $table->boolean('alert_stock')->default(false);
            $table->double('p_costo')->default(1);
            $table->double('p_costo_usd')->default(1);
            $table->double('p_venta')->default(1);
            $table->double('p_venta_usd')->default(1);
            $table->double('margen_min')->default(30);
            $table->double('dolar_base')->default(1);
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
