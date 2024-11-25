<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('game_histories', function (Blueprint $table) {
            $table->id();

            $table->integer('history_id'); // Primary key
            $table->string('agent_code');
            $table->string('user_code');
            $table->string('provider_code');
            $table->string('game_code');
            $table->string('type');
            $table->decimal('bet_money', 15, 2);
            $table->decimal('win_money', 15, 2)->default(0);
            $table->string('txn_id');
            $table->string('txn_type');
            $table->decimal('user_start_balance', 15, 2);
            $table->decimal('user_end_balance', 15, 2);
            $table->decimal('agent_start_balance', 15, 2);
            $table->decimal('agent_end_balance', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_histories');
    }
};
