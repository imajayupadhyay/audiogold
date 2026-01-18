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
        Schema::create('about_page_settings', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_badge')->nullable();
            $table->string('hero_title_line1')->nullable();
            $table->string('hero_title_line2')->nullable();
            $table->text('hero_subtitle')->nullable();

            // Story Section
            $table->string('story_title')->nullable();
            $table->text('story_content')->nullable();
            $table->string('mission_title')->nullable();
            $table->text('mission_content')->nullable();

            // Values Section
            $table->string('values_title')->nullable();
            $table->string('values_subtitle')->nullable();
            $table->json('values')->nullable();

            // Stats Section
            $table->json('stats')->nullable();

            // Team Section
            $table->string('team_title')->nullable();
            $table->string('team_subtitle')->nullable();
            $table->json('team_members')->nullable();

            // Innovation Section
            $table->string('innovation_title')->nullable();
            $table->text('innovation_content')->nullable();
            $table->json('innovations')->nullable();
            $table->json('innovation_stats')->nullable();

            // CTA Section
            $table->string('cta_title')->nullable();
            $table->text('cta_subtitle')->nullable();
            $table->string('cta_primary_text')->nullable();
            $table->string('cta_primary_link')->nullable();
            $table->string('cta_secondary_text')->nullable();
            $table->string('cta_secondary_link')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_page_settings');
    }
};
