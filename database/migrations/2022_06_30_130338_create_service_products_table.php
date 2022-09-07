<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('service_category_id');
            $table->foreign('service_category_id')->references('id')->on('service_categories')->onDelete('cascade');
            $table->unsignedBigInteger('service_sub_category_id');
            $table->foreign('service_sub_category_id')->references('parent_id')->on('service_categories');
            $table->string('name');
            $table->string('image');
            $table->double('price', 8, 2);
            $table->double('discount_amount', 8, 2);
            $table->double('discount_percentage', 3, 2);
            $table->integer('duration_in_minutes');
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
        Schema::dropIfExists('service_products');
    }
}
