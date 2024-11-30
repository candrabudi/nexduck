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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('role');
            $table->string('method'); // HTTP method (GET, POST, etc.)
            $table->string('menu'); // Name of the accessed menu
            $table->text('action'); // Description of the action performed
            $table->string('ip_address');
            $table->string('browser'); // Specific browser details
            $table->text('query_params')->nullable(); // Store query params as JSON
            $table->text('request_body')->nullable(); // Store request body
            $table->text('raw_json')->nullable(); // Store raw JSON if available
            $table->float('latency')->default(0); // Execution time latency
            $table->boolean('is_failed')->default(false); // Flag for failure
            $table->float('latitude')->nullable(); // Latitude of the user (current location)
            $table->float('longitude')->nullable(); // Longitude of the user (current location)
            $table->integer('response_code'); // HTTP response code
            $table->text('response_body')->nullable(); // HTTP response body
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
