<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->id();
            $table->string('order_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('mode')->nullable();
            $table->string('cardCategory')->nullable();
            $table->string('pg_type')->nullable();
            $table->string('bank_ref_num')->nullable();
            $table->string('bank_code')->nullable();
            $table->string('payment_source')->nullable();
            $table->string('easepayid')->nullable();
            $table->string('productinfo')->nullable();
            $table->string('udf1')->nullable();
            $table->string('udf2')->nullable();
            $table->string('udf3')->nullable();
            $table->string('udf4')->nullable();
            $table->string('udf5')->nullable();
            $table->string('udf6')->nullable();
            $table->string('udf7')->nullable();
            $table->string('udf8')->nullable();
            $table->string('udf9')->nullable();
            $table->string('udf10')->nullable();
            $table->string('hash')->nullable();
            $table->float('amount',12,2)->nullable();
            $table->float('net_amount_debit')->nullable();
            $table->string('deduction_percentage')->nullable();
            $table->float('cash_back_percentage')->nullable();
            $table->string('status')->nullable();
            $table->string('addedon')->nullable();
            $table->string('error_message')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
