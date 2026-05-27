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
        Schema::create('freelance_prices', function (Blueprint $table) {
            $table->id();
            $table->string('service_name_id');
            $table->string('service_name_en');
            $table->text('description_id')->nullable();
            $table->text('description_en')->nullable();
            $table->json('features_id'); // Store array of features in Indonesian
            $table->json('features_en'); // Store array of features in English
            $table->unsignedInteger('price_start'); // Storing Indonesian Rupiah amounts
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelance_prices');
    }
};
