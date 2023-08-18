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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->ulid('ulid');
            $table->string('name');
            $table->text('description');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('discount')->nullable();
            $table->string('discount_status')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('condition_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('condition_id')->references('id')->on('conditions')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
