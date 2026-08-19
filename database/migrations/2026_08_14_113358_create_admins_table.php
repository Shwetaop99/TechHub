<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {

            $table->id();

            $table->string('email')->unique();

            $table->string('password');

            $table->boolean('can_add_products')
                ->default(false);

            $table->boolean('can_view_visitors')
                ->default(false);

            $table->boolean('can_view_orders')
                ->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};