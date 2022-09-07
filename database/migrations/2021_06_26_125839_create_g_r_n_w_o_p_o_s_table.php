<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGRNWOPOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('g_r_n_w_o_p_o_s', function (Blueprint $table) {

            $table->id();
            $table->string('lr_number')->nullable();
            $table->string('supplier_id')->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('carrier_name')->nullable();
            $table->string('invoice_number')->nullable();
            $table->date('invoice_date')->nullable();
            $table->float('invoice_value',12,2)->nullable();
            $table->date('delivery_date')->nullable();
            $table->longText('remark')->nullable();
            $table->longText('barcode')->nullable();
            $table->longText('product_name')->nullable();
            $table->longText('quantity')->nullable();
            $table->longText('mrp_price')->nullable();
            $table->longText('unit_price')->nullable();
            $table->longText('cost_price')->nullable();
            $table->longText('sv_sell_price')->nullable();
            $table->longText('eb_sell_price')->nullable();
            $table->longText('weight')->nullable();
            $table->longText('unit')->nullable();
            $table->longText('unit_tax')->nullable();
            $table->longText('unit_gst')->nullable();
            $table->longText('unit_others')->nullable();
            $table->longText('sgst')->nullable();
            $table->longText('cgst')->nullable();
            $table->longText('igst')->nullable();
            $table->longText('ugst')->nullable();
            $table->longText('cess')->nullable();
            $table->longText('apmc')->nullable();
            $table->longText('hsn_sac')->nullable();
            $table->longText('discount')->nullable();
            $table->longText('mfg_date')->nullable();
            $table->longText('exp_date')->nullable();
            $table->longText('tax')->nullable();
            $table->longText('amount')->nullable();
            $table->float('sub_total',12,2)->nullable();
            $table->float('total_tax',12,2)->nullable();
            $table->float('grand_total',12,2)->nullable();
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
        Schema::dropIfExists('g_r_n_w_o_p_o_s');
    }
}
