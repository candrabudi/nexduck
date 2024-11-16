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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('provider_name');
            $table->string('provider_slug');
            $table->string('provider_code');
            $table->integer('provider_position')->default(0);
            $table->string('provider_image')->nullable();
            $table->string('provider_icon')->nullable();
            $table->string('provider_icon_nav')->nullable();
            $table->integer('provider_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
