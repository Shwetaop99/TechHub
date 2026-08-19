<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            // Customer information
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            // Product information
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->cascadeOnDelete();

            // Order details
            $table->integer('quantity');

            $table->decimal('price', 10, 2);

            $table->decimal('total', 10, 2);

            // Order status
            $table->string('status')
                  ->default('pending');

            // Admin notification status
            $table->boolean('is_read')
                  ->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};