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
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('is_slider_section')->default(1);
            $table->tinyInteger('is_register_section')->default(1);
            $table->tinyInteger('is_about_section')->default(1);
            $table->tinyInteger('is_service_section')->default(1);
            $table->string('donation_title')->nullable();
            $table->string('donation_subtitle')->nullable();
            $table->longText('donation_description')->nullable();
            $table->longText('donation_points')->nullable();
            $table->string('volunteer_section_image')->nullable();
            $table->string('volunteer_section_heading')->nullable();
            $table->string('volunteer_section_link_text')->nullable();
            $table->string('volunteer_section_link')->nullable();
            $table->string('donation_section_image')->nullable();
            $table->string('donation_section_heading')->nullable();
            $table->string('donation_section_link_text')->nullable();
            $table->string('donation_section_link')->nullable();
            $table->string('support_donation_title')->nullable();
            $table->string('support_donation_subtitle')->nullable();
            $table->string('support_donation_description')->nullable();
            $table->string('support_donation_points')->nullable();
            $table->string('helping_donation_section_subtitle')->nullable();
            $table->string('helping_donation_section_heading')->nullable();
            $table->string('helping_donation_section_link_text')->nullable();
            $table->string('helping_donation_section_link')->nullable();
            $table->string('press_title')->nullable();
            $table->string('press_logo')->nullable();
            $table->string('last_section_subtitle')->nullable();
            $table->string('last_section_heading')->nullable();
            $table->string('last_section_points')->nullable();
            $table->string('last_section_link_text')->nullable();
            $table->string('last_section_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_settings');
    }
};
