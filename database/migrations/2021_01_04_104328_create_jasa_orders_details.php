<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJasaOrdersDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa_orders_details', function (Blueprint $table) {
            $table->id();
            $table->integer('jasa_order_id')->unsigned();
            $table->decimal('jasa_order_price');
            $table->decimal('jasa_order_discount');
            $table->decimal('jasa_order_adminfees');
            $table->decimal('jasa_order_total');
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
        Schema::dropIfExists('jasa_orders_details');
    }
}
