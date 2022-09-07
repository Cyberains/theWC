<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturnItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */ 
    public function up()
    {
        Schema::create('return_items', function (Blueprint $table) {
                    
            $table->id();
            $table->integer('biller_id')->nullbale();
            $table->string('credit_id')->nullbale();
            $table->string('receipt_id')->nullbale();
            $table->string('retutrn_receipt_id')->nullbale();
            $table->text('returnqty')->nullable(); 
            $table->text('product_name')->nullable();
            $table->text('weight')->nullable();
            $table->text('unit_check')->nullable();
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
            $table->text('amount')->nullable();
            $table->text('subtotal')->nullable();
            $table->text('total_tax')->nullable();
            $table->text('cn_status')->nullable();
            $table->text('grand_total')->nullable();
            $table->text('received_cash')->nullable();
            $table->string('credit_note_rupees')->nullable();
            $table->boolean('credit_note_status')->nullable();
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
        Schema::dropIfExists('return_items');
    }
}
