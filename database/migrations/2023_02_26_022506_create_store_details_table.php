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
        Schema::create('store_details', function (Blueprint $table) {
            $table->id();
            $table->string('store_name')->unique();
            $table->string('store_phone');
            $table->string('store_email')->unique();
            $table->string('store_logo');
            $table->string('store_bio');
            $table->string('store_website')->nullable();
            $table->string('business_license_number')->nullable();
            $table->string('social_media_urls');
            $table->string('physical_location')->nullable();
            $table->string('reviews');
            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->tinyInteger('status');

            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_details');
    }
};
