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
        Schema::create('live_chats', function (Blueprint $table) {
            $table->id();
            $table->string('link_livechat')->nullable(); // Store live chat link, nullable
            $table->string('code_livechat')->nullable(); // Store live chat code, nullable
            $table->text('scripts_js_livechat')->nullable(); // Store JS script for live chat, nullable
            $table->timestamps(); // To store created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_chats');
    }
};
