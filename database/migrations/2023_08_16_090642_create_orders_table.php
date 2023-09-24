<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->ulid('ulid');
            $table->string('order_id');
            $table->integer('total_payment');
            $table->string('payment_type');
            $table->string('payment_link')->nullable();
            $table->enum('status',['success','pending','failed','waiting'])->default('pending');
            $table->integer('shipping_fee');
            $table->string('shipping_service');
            $table->string('shipping_code');
            $table->enum('shipping_method',['POS','JNE'])->nullable();
            $table->string('shipping_estimated')->nullable();
            $table->string('shipping_description');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
