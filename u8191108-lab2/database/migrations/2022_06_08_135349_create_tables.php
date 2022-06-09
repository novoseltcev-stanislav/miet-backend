<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->boolean('is_blocked');
            $table->string('phone_number');
            $table->string('email');
            $table->dateTime('created_at');
        });

        Schema::create('addresses', function(Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('city');
            $table->string('street');
            $table->integer('building');
            $table->integer('floor');
            $table->integer('apartment');
            $table->integer('intercom_code');
            $table->dateTime('created_at');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
        Schema::dropIfExists('customers');
    }
};
