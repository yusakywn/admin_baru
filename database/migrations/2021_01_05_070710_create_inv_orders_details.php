<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvOrdersDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_orders_details', function (Blueprint $table) {
            $table->id();
            $table->integer('inv_order_id')->unsigned();
            $table->decimal('inv_order_price');
            $table->decimal('inv_order_discount');
            $table->decimal('inv_order_adminfees');
            $table->decimal('inv_order_total');
            $table->string('inv_payment_type');
            $table->string('inv_payment_status');
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
        Schema::dropIfExists('inv_orders_details');
    }
}
