<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('support_conversations', function (Blueprint $table) {

            $table->id();

            // Customer who created the enquiry
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Optional order related to the enquiry
            $table->foreignId('order_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Example:
            // General Inquiry
            // Order Status / Dispatch
            // Bulk & Wholesale Discount
            $table->string('inquiry_type');

            // open / closed
            $table->string('status')
                ->default('open');

            // Used to show the latest activity
            $table->timestamp('last_message_at')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('support_conversations');
    }
};