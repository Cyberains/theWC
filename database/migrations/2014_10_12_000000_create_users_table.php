<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('name')->nullable();
            $table->string('qualification')->nullable();
            $table->string('experience')->nullable();
            $table->string('working_location')->nullable();
            $table->string('refer_code')->nullable();
            $table->string('role')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->boolean('mobile_status')->default(0);
            $table->integer('mobile_otp')->nullable();
            $table->dateTime('mobile_otp_expire')->nullable();
            $table->string('email')->nullable();
            $table->boolean('email_status')->default(0);
            $table->integer('email_otp')->nullable();
            $table->dateTime('email_otp_expire')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->longText('upload_photo')->nullable();
            $table->string('dob')->nullable();
            $table->string('address_id')->nullable();
            $table->boolean('membership_status')->default(0);
            $table->date('m_start_date')->nullable();
            $table->date('m_end_date')->nullable();
            $table->string('m_payment')->nullable();
            $table->float('m_price')->nullable();
            $table->string('password')->nullable();
            $table->boolean('is_active')->default(1);
            $table->rememberToken()->nullable();
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
        Schema::dropIfExists('users');
    }
}
