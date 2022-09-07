<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {

            $table->id();
            $table->integer('supplier_id');
            $table->string('purchase_id');
            $table->string('seller');
            $table->string('ship_to');
            $table->string('ship_address');
            $table->longText('sku_code');
            $table->longText('product_name');
            $table->longText('mrp_price');
            $table->longText('basic_price');
            $table->longText('quantity');
            $table->longText('weight')->nullale();
            $table->longText('sgst_tax')->nullable();
            $table->longText('cgst_tax')->nullable();
            $table->longText('igst_tax')->nullable();
            $table->longText('ugst_tax')->nullable();
            $table->longText('cess_tax')->nullable();
            $table->longText('apmc_tax')->nullable();
            $table->longText('unit_tax_percentage');
            $table->longText('tax_price');
            $table->longText('amount');
            $table->float('sub_total');
            $table->float('total_tax');
            $table->float('grand_total');
            $table->string('note')->nullable();
            $table->date('po_delivery_date')->nullable();
            $table->string('advance_payment_type');
            $table->string('payment_rupee_percent')->nullable();
            $table->float('advance_payment_amount')->nullable();
            $table->boolean('expire_status')->default(0);
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
        Schema::dropIfExists('purchases');
    }
}
