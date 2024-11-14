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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('admin_bank_id')->default(0);
            $table->unsignedBigInteger('user_bank_id')->default(0);
            $table->unsignedBigInteger('promotion_id')->default(0);
            $table->integer('amount');
            $table->enum('status', ['pending', 'process', 'approved', 'rejected'])->default('pending');
            $table->enum('type', ['deposit', 'withdraw', 'bonus', 'rolling', 'cashback'])->default('deposit');
            $table->text('reason')->nullable();
            $table->string('proof_of_transfer')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->string('created_ip_address');
            $table->string('updated_ip_address')->nullable();
            $table->timestamps();
            
            $table->index(['status', 'updated_by', 'created_at']);
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
