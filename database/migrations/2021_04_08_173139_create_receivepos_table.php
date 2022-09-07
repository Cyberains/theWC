<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiveposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receivepos', function (Blueprint $table) {

            $table->id();
            $table->string('lrnumber')->nullable();
            $table->bigInteger('purchase_id')->nullable();
            $table->string('poreference')->nullable();
            $table->string('suppplierid')->nullable();
            $table->string('supppliername')->nullable();
            $table->string('carriername')->nullable();
            $table->date('expected_date')->nullable();
            $table->date('remaindermail')->nullable();
            $table->string('invoicenumber')->nullable();
            $table->date('invoicedate')->nullable();
            $table->string('scansku')->nullable();
            $table->float('invoicevalue')->nullable();
            $table->string('discountvalue')->nullable();
            $table->string('remark')->nullable();
            $table->string('skucode')->nullable();
            $table->string('barcode_id')->nullable();
            $table->string('productname')->nullable();
            $table->string('qty')->nullable();
            $table->string('receivedqty')->nullable();
            $table->string('offer')->nullable();
            $table->string('uom')->nullable();
            $table->string('unitprice')->nullable();
            $table->string('buyprice')->nullable();
            $table->string('mrp')->nullable();
            $table->string('weight')->nullable();
            $table->string('discount')->nullable();
            $table->string('batchno')->nullable();
            $table->string('mfgdata')->nullable();
            $table->string('expdate')->nullable();
            $table->string('tax')->nullable();
            $table->string('cess')->nullable();
            $table->string('apmc')->nullable();
            $table->string('returnquantity')->nullable();
            $table->string('discrepancyresson')->nullable();
            $table->string('total')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('total_tax')->nullable();
            $table->string('tax_price')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('credit')->nullable();
            $table->string('debit')->nullable();
            $table->string('purchase_amount')->nullable();
            $table->string('purchage_grand_total')->nullable();
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
        Schema::dropIfExists('receivepos');
    }
}
