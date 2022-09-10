<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferOfTheDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_of_the_day', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('base_path');
            $table->string('image');
            $table->text('terms_and_conditions')->nullable();
            $table->float('offer_value');
            $table->enum('offer_value_type',['$','%']);
            $table->string('type');
            $table->integer('min_price');
            $table->dateTime('s_time');
            $table->dateTime('e_time');
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
        Schema::dropIfExists('offer_of_the_day');
    }
}
