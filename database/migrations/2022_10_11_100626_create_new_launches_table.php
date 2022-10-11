<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewLaunchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_launches', function (Blueprint $table) {
            $table->id();
            $table->string('base_path')->nullable();
            $table->string('banner_image')->nullable();
            $table->enum('type',['Service List','Service'])->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('service_id')->nullable();
            $table->boolean('is_active');
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
        Schema::dropIfExists('new_launches');
    }
}
