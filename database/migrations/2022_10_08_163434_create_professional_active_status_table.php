<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalActiveStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_active_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('professional_id');
            $table->foreign('professional_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('login_time');
            $table->dateTime('logout_time')->nullable();
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
        Schema::dropIfExists('professional_active_status');
    }
}
