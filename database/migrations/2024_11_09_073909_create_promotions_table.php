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
            $table->text('content');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('promotion_type', ['winover', 'turnover', 'post'])->default('post');
            $table->enum('provider_category', ['slot', 'casino'])->nullable();
            $table->enum('bonus_type', ['daily', 'old', 'new'])->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('thumbnail');
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
