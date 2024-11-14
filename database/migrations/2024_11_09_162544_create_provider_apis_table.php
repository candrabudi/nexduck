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
        Schema::create('provider_apis', function (Blueprint $table) {
            $table->id();
            $table->integer('api_credential_id');
            $table->integer('provider_id');
            $table->string('provider_name');
            $table->string('provider_code');
            $table->integer('provider_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_apis');
    }
};
