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
        Schema::create('claim_promotions', function (Blueprint $table) {
            $table->id();
            $table->integer('promotion_id');
            $table->integer('user_id');
            $table->integer('nominal_deposit');
            $table->integer('current_target');
            $table->integer('target');
            $table->integer('status', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('claim_promotions');
    }
};
