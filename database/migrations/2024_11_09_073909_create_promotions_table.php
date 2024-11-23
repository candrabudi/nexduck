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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('short_desc');
            $table->text('desc');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('type', ['turnover', 'winover', 'balance', 'manual']);
            $table->integer('claim_deposit')->default(0);
            $table->integer('min_deposit')->default(0);
            $table->integer('max_deposit')->default(0);
            $table->integer('max_withdraw')->default(0);
            $table->integer('target')->default(0);
            $table->integer('status')->default(1);
            $table->string('image');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
