<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGarbageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */ 
    public function up()
    {
        Schema::create('garbage_items', function (Blueprint $table) {
            $table->id(); 
            $table->string('product_name')->nullbale();
           $table->text('qty')->nullable();
            $table->text('weight')->nullable();
            $table->text('unit_tax')->nullable();
            $table->text('unit_gst')->nullable();
            $table->text('unit_others')->nullable();
            $table->text('barcode')->nullable();
            $table->text('hsn_sac')->nullable();
            $table->text('mrp_price')->nullable();
            $table->text('price')->nullable();
            $table->text('discount')->nullable();
            $table->text('expiry_date')->nullable();
            $table->text('tax')->nullable();
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
        Schema::dropIfExists('garbage_items');
    }
}
