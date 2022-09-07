<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('base_path')->nullable();
            $table->string('service_image')->nullable();
            $table->string('service_product_image')->nullable();
            $table->string('service_demo_video')->nullable();
            $table->integer('service_time');
            $table->string('slug');
            $table->boolean('status')->default(1);
            $table->float('price');
            $table->float('discount')->default(0);
            $table->float('discounted_price');
            $table->enum('tag',['New','NoTag','Exclusive'])->default('NoTag');
            $table->id('category_id')->autoIncrement(false);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->id('sub_category_id')->autoIncrement(false);
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');

//            $table->id('product_id')->autoIncrement(false);
//            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('description')->nullable();
            $table->string('recommended_for')->nullable();
            $table->string('benefits')->nullable();
            $table->string('steps')->nullable();
            $table->string('things_to_know')->nullable();
            $table->string('indicated_for')->nullable();
            $table->string('kit_content')->nullable();
            $table->string('suggestion')->nullable();
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
        Schema::dropIfExists('services');
    }
}
