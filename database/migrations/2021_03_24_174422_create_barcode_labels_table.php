<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarcodeLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barcode_labels', function (Blueprint $table) {

            $table->id();
            $table->string('product_name')->nullable();
            $table->string('barcode')->nullable();
            $table->string('mrp_price')->nullable();
            $table->string('weight')->nullable();
            $table->string('unit')->nullable();
            $table->string('quantity')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('barcode_labels');
    }
}
