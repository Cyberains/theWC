<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->id('category_id')->autoIncrement(false);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->id('sub_category_id')->autoIncrement(false);
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->string('slug');
            $table->boolean('status')->default(1);
            $table->float('price');
            $table->float('discount')->default(0);
            $table->float('discounted_price');
            $table->string('base_path')->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity')->default(0);
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
        Schema::dropIfExists('products');
    }
}
