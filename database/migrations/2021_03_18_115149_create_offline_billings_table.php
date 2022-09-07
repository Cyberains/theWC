<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfflineBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offline_billings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('biller_id')->nullable();
            $table->string('name')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->longText('receipt_id')->nullable();
            $table->longText('barcode')->nullable();
            $table->longText('product_name')->nullable();
            $table->longText('weight')->nullable();
            $table->longText('unit_check')->nullable();
            $table->longText('unit_tax')->nullable();
            $table->longText('unit_gst')->nullable();
            $table->longText('unit_others')->nullable();
            $table->longText('hsn_sac')->nullable();
            $table->longText('mrp_price')->nullable();
            $table->longText('price')->nullable();
            $table->longText('discount')->nullable();
            $table->longText('expiry_date')->nullable();
            $table->longText('quantity')->nullable();
            $table->longText('tax')->nullable();
            $table->longText('amount')->nullable();
            $table->float('subtotal',12,2)->nullable();
            $table->float('total_tax',12,2)->nullable();
            $table->boolean('cn_status')->nullable();
            $table->float('cn_rupees',12,2)->nullable();
            $table->string('cn_number')->nullable();
            $table->float('grand_total',12,2)->nullable();
            $table->string('payment_method')->nullable();
            $table->float('received_cash',12,2)->nullable();
            $table->string('payment_method1')->nullable();
            $table->float('received_cash1',12,2)->nullable();
            $table->string('eb_coupon_method')->nullable();
            $table->float('eb_coupon_cash',12,2)->nullable();
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
        Schema::dropIfExists('offline_billings');
    }
}
