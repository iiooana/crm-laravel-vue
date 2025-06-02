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
        Schema::create('pings', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('website_ping_setting_id');
            $table->foreign('website_ping_setting_id')->references('id')->on('website_ping_settings');
            $table->string('status_code');
            $table->json('headers');
            $table->text('body')->nullable();

            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pings');
    }
};
