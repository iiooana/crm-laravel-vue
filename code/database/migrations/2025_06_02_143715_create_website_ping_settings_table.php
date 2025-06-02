<?php

use App\Models\Website\Website;
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
        Schema::create('website_ping_settings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('website_id');
            $table->foreign('website_id')->references('id')->on('websites');

            $table->boolean('active')->default(true);
            $table->smallInteger('every_minute')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_ping_settings');
    }
};
