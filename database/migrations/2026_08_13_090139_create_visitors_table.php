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
        Schema::create('visitors', function (Blueprint $table) {

            $table->id();

            // Visitor IP address
            $table->string('ip_address')->nullable();

            // Device information
            $table->string('device')->nullable();

            // Browser information
            $table->string('browser')->nullable();

            // Number of visits from this visitor
            $table->unsignedInteger('visits')->default(1);

            // First time visitor was recorded
            $table->timestamp('first_visited_at')
                  ->nullable();

            // Most recent visit
            $table->timestamp('last_visited_at')
                  ->nullable();

            $table->timestamps();

            // One record per IP address
            $table->unique('ip_address');

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};