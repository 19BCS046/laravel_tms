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
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('title')->nullable();
            $table->string('location')->nullable();
            $table->string('username')->nullable();
            $table->string('cost')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('location');
            $table->dropColumn('username');
            $table->dropColumn('cost');

        });
    }
};
