<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_id');
            $table->string('supplier_name');
            $table->string('supplier_address');
            $table->string('supplier_email');
            $table->bigInteger('supplier_mobile');
            $table->string('gst_in');
            $table->string('pan_no');
            $table->integer('pincode');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('tax_type')->nullable();
            $table->integer('po_expiry_duration');
            $table->string('owner_name')->nullable();
            $table->bigInteger('owner_number')->nullable();
            $table->string('owner_email')->nullable();
            $table->string('spoc_name')->nullable();
            $table->bigInteger('spoc_number')->nullable();
            $table->string('spoc_email')->nullable();
            $table->integer('lead_time');
            $table->integer('credit_period');
            $table->string('bank_name');
            $table->string('ifsc_code');
            $table->string('branch_name');
            $table->string('account_number');
            $table->string('account_holder_name');
            $table->string('secondary_email');
            $table->string('balance')->nullable();
            $table->boolean('is_active')->default(0);
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
        Schema::dropIfExists('suppliers');
    }
}
