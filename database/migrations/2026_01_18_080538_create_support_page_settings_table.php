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
        Schema::create('support_page_settings', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_subtitle')->nullable();

            // Quick Support Options
            $table->json('quick_support_options')->nullable();

            // Self-Help Resources Section
            $table->string('self_help_title')->nullable();
            $table->string('self_help_subtitle')->nullable();
            $table->json('self_help_resources')->nullable();

            // Product Support Section
            $table->string('product_support_title')->nullable();
            $table->string('product_support_subtitle')->nullable();
            $table->json('product_support_cards')->nullable();

            // Video Tutorials Section
            $table->string('video_title')->nullable();
            $table->text('video_subtitle')->nullable();
            $table->string('video_button_text')->nullable();
            $table->string('video_button_link')->nullable();

            // Warranty Section
            $table->string('warranty_title')->nullable();
            $table->string('warranty_subtitle')->nullable();
            $table->json('warranty_features')->nullable();
            $table->string('warranty_link_text')->nullable();

            // Order Support Section
            $table->string('order_title')->nullable();
            $table->string('order_subtitle')->nullable();
            $table->json('order_features')->nullable();
            $table->string('order_link_text')->nullable();

            // Contact Form Section
            $table->string('contact_title')->nullable();
            $table->string('contact_subtitle')->nullable();

            // Contact Information
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('timing_days')->nullable();
            $table->string('timing_hours')->nullable();
            $table->text('address')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_page_settings');
    }
};
