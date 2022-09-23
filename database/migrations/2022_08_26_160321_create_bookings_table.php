<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('bookingId')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('professional_id')->nullable();
            $table->enum('status',['pending','processing','done','failed'])->default('pending');
            $table->unsignedBigInteger('user_service_address_id');
            $table->time('time_slot');
            $table->date('date_slot');
            $table->timestamps();
        });

        Schema::create('booking_services', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id');
            $table->foreign('booking_id')->references('bookingId')->on('bookings');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->float('mrp');
            $table->float('discount');
            $table->float('price');
            $table->timestamps();
        });

        Schema::create('booking_services_payment', function (Blueprint $table) {
            $table->id();
            $table->string('booking_id');
            $table->foreign('booking_id')->references('bookingId')->on('bookings');
            $table->string('payment_id');
            $table->enum('payment_status',['pending','processing','done'])->default('pending');
            $table->date('settlement_date');
            $table->enum('settlement_status',['pending','processing','done'])->default('pending');
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
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('booking_services');
        Schema::dropIfExists('booking_services_payment');
    }
}
