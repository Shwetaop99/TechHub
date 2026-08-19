<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visitors', function (Blueprint $table) {

            // Remove the old IP-only unique restriction
            $table->dropUnique([
                'ip_address'
            ]);

            // One visitor record per IP + device + browser
            $table->unique([
                'ip_address',
                'device',
                'browser'
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('visitors', function (Blueprint $table) {

            $table->dropUnique([
                'ip_address',
                'device',
                'browser'
            ]);

            $table->unique('ip_address');
        });
    }
};