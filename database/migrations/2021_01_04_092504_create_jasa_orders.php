<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJasaOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jasa_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('jasa_order_id');
            $table->integer('jasa_buyer_id');
            $table->integer('jasa_seller_id');
            $table->integer('jasa_portofolio_id');
            $table->string('jasa_order_lokasi');
            $table->string('jasa_order_phone');
            $table->text('jasa_order_note');
            //$table->decimal('jasa_order_price');
            $table->text('jasa_order_example');
            $table->text('jasa_order_result');
            $table->string('jasa_order_info');
            $table->string('jasa_order_status');
            $table->decimal('jasa_order_invoice');
            $table->dateTime('jasa_order_deadline');
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
        Schema::dropIfExists('jasa_orders');
    }
}
