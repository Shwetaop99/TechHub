<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {

            $table->id();

            // Coupon code
            $table->string('code')->unique();

            // percentage OR fixed
            $table->enum('type', [
                'percentage',
                'fixed'
            ]);

            // Discount amount
            $table->decimal(
                'value',
                10,
                2
            );

            // Minimum product price required
            $table->decimal(
                'minimum_amount',
                10,
                2
            )->default(10000);

            // Optional expiry
            $table->dateTime('expires_at')
                  ->nullable();

            // Active / inactive
            $table->boolean('is_active')
                  ->default(true);

            // Number of times used
            $table->integer('used_count')
                  ->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};