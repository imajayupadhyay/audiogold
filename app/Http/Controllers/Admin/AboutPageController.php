<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPageSetting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutPageController extends Controller
{
    /**
     * Display the about page settings.
     */
    public function index()
    {
        $aboutSettings = AboutPageSetting::first();
        $defaults = AboutPageSetting::getDefaults();

        return Inertia::render('Admin/AboutPage/Index', [
            'aboutSettings' => $aboutSettings,
            'defaults' => $defaults,
        ]);
    }

    /**
     * Update the about page settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            // Hero Section
            'hero_badge' => 'nullable|string|max:255',
            'hero_title_line1' => 'nullable|string|max:255',
            'hero_title_line2' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:1000',

            // Story Section
            'story_title' => 'nullable|string|max:255',
            'story_content' => 'nullable|string|max:2000',
            'mission_title' => 'nullable|string|max:255',
            'mission_content' => 'nullable|string|max:2000',

            // Values Section
            'values_title' => 'nullable|string|max:255',
            'values_subtitle' => 'nullable|string|max:500',
            'values' => 'nullable|array',
            'values.*.title' => 'nullable|string|max:255',
            'values.*.description' => 'nullable|string|max:500',
            'values.*.icon' => 'nullable|string',
            'values.*.gradient' => 'nullable|string|max:255',

            // Stats Section
            'stats' => 'nullable|array',
            'stats.*.value' => 'nullable|string|max:50',
            'stats.*.label' => 'nullable|string|max:100',

            // Team Section
            'team_title' => 'nullable|string|max:255',
            'team_subtitle' => 'nullable|string|max:500',
            'team_members' => 'nullable|array',
            'team_members.*.name' => 'nullable|string|max:255',
            'team_members.*.role' => 'nullable|string|max:255',
            'team_members.*.image' => 'nullable|string|max:500',
            'team_members.*.bio' => 'nullable|string|max:500',

            // Innovation Section
            'innovation_title' => 'nullable|string|max:255',
            'innovation_content' => 'nullable|string|max:2000',
            'innovations' => 'nullable|array',
            'innovations.*' => 'nullable|string|max:255',
            'innovation_stats' => 'nullable|array',
            'innovation_stats.*.value' => 'nullable|string|max:50',
            'innovation_stats.*.label' => 'nullable|string|max:100',
            'innovation_stats.*.gradient' => 'nullable|string|max:255',

            // CTA Section
            'cta_title' => 'nullable|string|max:255',
            'cta_subtitle' => 'nullable|string|max:500',
            'cta_primary_text' => 'nullable|string|max:100',
            'cta_primary_link' => 'nullable|string|max:255',
            'cta_secondary_text' => 'nullable|string|max:100',
            'cta_secondary_link' => 'nullable|string|max:255',
        ]);

        $aboutSettings = AboutPageSetting::first();

        if ($aboutSettings) {
            $aboutSettings->update($validated);
        } else {
            AboutPageSetting::create($validated);
        }

        return redirect()->route('admin.about-page.index')
            ->with('success', 'About page settings updated successfully.');
    }

    /**
     * Reset about page settings to defaults.
     */
    public function reset()
    {
        $aboutSettings = AboutPageSetting::first();

        if ($aboutSettings) {
            $aboutSettings->delete();
        }

        return redirect()->route('admin.about-page.index')
            ->with('success', 'About page settings reset to defaults.');
    }
}
