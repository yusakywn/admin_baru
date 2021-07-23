<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyJobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_jobs', function (Blueprint $table) {
            $table->id('applyer_id');
            $table->string('applyer_name');
            $table->string('applyer_email');
            $table->string('applyer_phone');
            $table->string('applyer_address');
            $table->string('applyer_bio');
            $table->string('applyer_level');
            $table->string('applyer_cv')->nullable();
            $table->string('applyer_portfolio')->nullable();
            $table->string('applyer_status');
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
        Schema::dropIfExists('apply_jobs');
    }
}
