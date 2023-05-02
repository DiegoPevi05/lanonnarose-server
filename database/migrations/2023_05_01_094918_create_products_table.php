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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title_es',255)->default('N/A');
            $table->string('title_en',255)->default('N/A');
            $table->text('shortDescription_es',255)->default('N/A');
            $table->text('shortDescription_en',255)->default('N/A');
            $table->text('description_es')->default('N/A');
            $table->text('description_en')->default('N/A');
            $table->longText('imageUrl')->default('N/A');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
