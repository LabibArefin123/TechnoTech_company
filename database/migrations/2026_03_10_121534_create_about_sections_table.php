<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_sections', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('tagline')->nullable();

            $table->text('paragraph_1');
            $table->text('paragraph_2')->nullable();
            $table->text('paragraph_3')->nullable();

            $table->string('mission_title')->default('Our Mission');
            $table->text('mission_text');

            $table->string('vision_title')->default('Our Vision');
            $table->text('vision_text');

            $table->string('image_1');
            $table->string('image_2');

            $table->boolean('status')->default(1);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
