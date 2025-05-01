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
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('home_address')->nullable();
            $table->string('business_address')->nullable();
            $table->string('shopping_center')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('brand_logo')->nullable(); // simpan path gambar logo
            $table->string('brand_bg_color')->default('#22c55e'); // default green
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_settings');
    }
};