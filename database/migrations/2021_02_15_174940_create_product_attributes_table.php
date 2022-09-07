<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('product_attributes', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('barcode_id')->nullable();
            $table->string('unit')->nullable();
            $table->string('unit_check')->nullable();
            $table->float('mrp_price',12,2)->nullable();
            $table->float('selling_price',12,2)->nullable();
            $table->float('membership_price',12,2)->nullable();
            $table->float('basic_price',12,2)->nullable();
            $table->float('cost_price',12,2)->nullable();
            $table->float('eb_cost_price',12,2)->nullable();
            $table->boolean('offer_status')->default(0);
            $table->boolean('is_active')->nullable();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
