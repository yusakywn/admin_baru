<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('inv_order_id');
            $table->integer('inv_buyer_id');
            $table->integer('inv_templates_id');
            $table->text('inv_order_type');
            $table->text('inv_order_links');
            $table->string('inv_order_status');
            $table->string('inv_order_invoice');
            $table->dateTime('inv_order_ended');
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
        Schema::dropIfExists('inv_orders');
    }
}
