<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('frontend_settings', function (Blueprint $table) {
            $table->id();
            $table->string('theme_color')->nullable();
            $table->integer('text_size')->default(16);
            $table->integer('navbar_layout')->default(1);
            $table->integer('about_layout')->default(1);
            $table->boolean('dark_mode')->default(false);
            $table->boolean('animations')->default(true);
            $table->boolean('back_to_top')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frontend_settings');
    }
};
