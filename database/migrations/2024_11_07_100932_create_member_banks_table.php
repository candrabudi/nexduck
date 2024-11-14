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
        Schema::create('member_banks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('bank_id');
            $table->string('account_name');
            $table->string('account_number');
            $table->integer('account_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_banks');
    }
};
