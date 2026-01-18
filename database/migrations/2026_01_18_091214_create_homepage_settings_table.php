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
        Schema::create('homepage_settings', function (Blueprint $table) {
            $table->id();

            // About Section
            $table->string('about_badge')->nullable();
            $table->string('about_title_line1')->nullable();
            $table->string('about_title_line2')->nullable();
            $table->text('about_subtitle')->nullable();
            $table->string('about_mission_title')->nullable();
            $table->text('about_mission_text')->nullable();
            $table->text('about_story_paragraph1')->nullable();
            $table->text('about_story_paragraph2')->nullable();
            $table->json('about_key_points')->nullable();
            $table->json('about_feature_cards')->nullable();
            $table->string('about_cta_title')->nullable();
            $table->text('about_cta_subtitle')->nullable();
            $table->string('about_cta_primary_text')->nullable();
            $table->string('about_cta_primary_link')->nullable();
            $table->string('about_cta_secondary_text')->nullable();
            $table->string('about_cta_secondary_link')->nullable();

            // Why Choose Section
            $table->string('why_badge')->nullable();
            $table->string('why_title_line1')->nullable();
            $table->string('why_title_line2')->nullable();
            $table->text('why_subtitle')->nullable();
            $table->json('why_feature_cards')->nullable();
            $table->json('why_stats')->nullable();

            // Dealer Section
            $table->string('dealer_badge')->nullable();
            $table->string('dealer_title_line1')->nullable();
            $table->string('dealer_title_line2')->nullable();
            $table->text('dealer_subtitle')->nullable();
            $table->json('dealer_benefits')->nullable();
            $table->string('dealer_cta_title')->nullable();
            $table->text('dealer_cta_subtitle')->nullable();
            $table->string('dealer_cta_primary_text')->nullable();
            $table->string('dealer_cta_primary_link')->nullable();
            $table->string('dealer_cta_secondary_text')->nullable();
            $table->string('dealer_cta_secondary_link')->nullable();

            // Contact Section
            $table->string('contact_badge')->nullable();
            $table->string('contact_title_line1')->nullable();
            $table->string('contact_title_line2')->nullable();
            $table->text('contact_subtitle')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_whatsapp')->nullable();
            $table->string('contact_timing_days')->nullable();
            $table->string('contact_timing_hours')->nullable();
            $table->text('contact_address')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_settings');
    }
};
