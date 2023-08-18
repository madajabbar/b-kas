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
            $table->integer('total_payment');
            $table->string('payment_type');
            $table->enum('status',['success','pending','failed'])->default('pending');
            $table->unsignedBigInteger('cart_id');
            $table->timestamps();
            $table->foreign('cart_id')->references('id')->on('carts')->onUpdate('CASCADE')->onDelete('CASCADE');
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
