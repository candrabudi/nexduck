<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->enum('provider_category', ['slot', 'live_casino'])->default('slot');
            $table->enum('bonus_type', ['daily_bonus', 'new_member', 'old_member'])->default('daily_bonus');
        });
    }

    public function down()
    {
        Schema::table('promotions', function (Blueprint $table) {
            $table->dropColumn('provider_category');
            $table->dropColumn('bonus_type');
        });
    }
};
