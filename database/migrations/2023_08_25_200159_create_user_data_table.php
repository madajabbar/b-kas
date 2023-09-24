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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->text('address');
            $table->integer('postal_code');
            $table->unsignedBigInteger('user_id');
            $table->integer('province_id');
            $table->integer('city_id');
            $table->text('profile_image')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('province_id')->references('id')->on('provinces')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
