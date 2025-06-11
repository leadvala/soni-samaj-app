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
        Schema::create('register_sections', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('icon');
            $table->string('charity_name');
            $table->text('description');
            $table->string('contact_text');
            $table->string('contact_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register_sections');
    }
};
