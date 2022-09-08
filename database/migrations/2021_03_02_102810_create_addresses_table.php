<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {

            $table->id();
            $table->string('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('house_no')->nullable();
            $table->string('area')->nullable();
            $table->string('landmark')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('address_type')->nullable();
            $table->boolean('default')->default(1);
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('addresses');
    }
}
