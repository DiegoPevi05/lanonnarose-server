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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title_es',255)->default('N/A');
            $table->string('title_en',255)->default('N/A');
            $table->string('subTitle_es',255)->default('N/A');
            $table->string('subTitle_en',255)->default('N/A');
            $table->longText('description_es')->default('N/A');
            $table->longText('description_en')->default('N/A');
            $table->longText('image1')->default('N/A');
            $table->longText('image2')->default('N/A');
            $table->longText('image3')->default('N/A');
            $table->longText('image4')->default('N/A');
            $table->string('isImportant',1)->default('0');
            $table->json('bulletpoints_es');
            $table->json('bulletpoints_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
