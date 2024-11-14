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
        Schema::create('api_credentials', function (Blueprint $table) {
            $table->id();
            $table->string('agent_url');
            $table->string('agent_code');
            $table->string('agent_signature');
            $table->string('agent_password')->nullable();
            $table->enum('agent_type', ['sg', 'nexus', 'sgx'])->default('nexus');
            $table->integer('agent_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('api_credentials');
    }
};
