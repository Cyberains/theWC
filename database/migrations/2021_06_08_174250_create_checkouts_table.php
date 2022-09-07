<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('checkouts', function (Blueprint $table) {
            
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_name')->nullable();
            $table->float('mrp_price',12,2)->nullable();
            $table->float('unit_price',12,2)->nullable();
            $table->float('sgst_tax',12,2)->nullable();
            $table->float('cgst_tax',12,2)->nullable();
            $table->float('utgst_tax',12,2)->nullable();
            $table->float('cess_tax',12,2)->nullable();
            $table->float('apmc_tax',12,2)->nullable();
            $table->string('weight')->nullable();
            $table->float('quantity',12,2)->nullable();
            $table->float('unit_total_price',12,2)->nullable();
            $table->float('unit_total_tax',12,2)->nullable();
            $table->float('sub_total',12,2)->nullable();
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
        Schema::dropIfExists('checkouts');
    }
}
