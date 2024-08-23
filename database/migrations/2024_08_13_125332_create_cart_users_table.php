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
        Schema::create('cart_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('log_id');
            $table->unsignedBigInteger('touristcart_id');
            $table->timestamps();

            $table->foreign('log_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('touristcart_id')->references('id')->on('carts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_users');
    }
};
