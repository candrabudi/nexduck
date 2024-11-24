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
        Schema::create('promotion_details', function (Blueprint $table) {
            $table->id();
            $table->integer('promotion_id');
            $table->integer('min_deposit')->default(0);
            $table->integer('max_deposit')->default(0);
            $table->integer('max_withdraw')->default(0);
            $table->integer('target')->default(0);
            $table->integer('percentage_bonus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotion_details');
    }
};
