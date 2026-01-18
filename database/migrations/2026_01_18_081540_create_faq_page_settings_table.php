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
        Schema::create('faq_page_settings', function (Blueprint $table) {
            $table->id();

            // Hero Section
            $table->string('hero_badge')->nullable();
            $table->string('hero_title_line1')->nullable();
            $table->string('hero_title_line2')->nullable();
            $table->text('hero_subtitle')->nullable();

            // FAQ Categories and Items (stored as JSON for flexibility)
            $table->json('categories')->nullable();
            $table->json('faqs')->nullable();

            // Quick Actions Section
            $table->json('quick_actions')->nullable();

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
        Schema::dropIfExists('faq_page_settings');
    }
};
