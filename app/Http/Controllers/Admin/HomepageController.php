<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlide;
use App\Models\HomepageSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class HomepageController extends Controller
{
    /**
     * Display the homepage management page.
     */
    public function index()
    {
        $heroSlides = HeroSlide::ordered()->get();
        $homepageSettings = HomepageSetting::first();
        $defaults = HomepageSetting::getDefaults();

        return Inertia::render('Admin/Homepage/Index', [
            'heroSlides' => $heroSlides,
            'homepageSettings' => $homepageSettings,
            'defaults' => $defaults,
        ]);
    }

    /**
     * Store a new hero slide.
     */
    public function storeHeroSlide(Request $request)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_url' => 'nullable|url|max:500',
            'badge' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:50',
            'secondary_button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('hero-slides', $imageName, 'public');
            $validated['image'] = Storage::url($path);
        } elseif (!empty($validated['image_url'])) {
            $validated['image'] = $validated['image_url'];
        }
        unset($validated['image_url']);

        // Filter empty features
        if (isset($validated['features'])) {
            $validated['features'] = array_filter($validated['features'], fn($f) => !empty(trim($f)));
            $validated['features'] = array_values($validated['features']);
        }

        HeroSlide::create($validated);

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Hero slide created successfully.');
    }

    /**
     * Update an existing hero slide.
     */
    public function updateHeroSlide(Request $request, HeroSlide $heroSlide)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_url' => 'nullable|url|max:500',
            'existing_image' => 'nullable|string',
            'badge' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'secondary_button_text' => 'nullable|string|max:50',
            'secondary_button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists and is local
            if ($heroSlide->image && !filter_var($heroSlide->image, FILTER_VALIDATE_URL)) {
                $oldPath = str_replace('/storage/', '', $heroSlide->image);
                Storage::disk('public')->delete($oldPath);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('hero-slides', $imageName, 'public');
            $validated['image'] = Storage::url($path);
        } elseif (!empty($validated['image_url'])) {
            $validated['image'] = $validated['image_url'];
        } elseif (!empty($validated['existing_image'])) {
            $validated['image'] = $validated['existing_image'];
        }
        unset($validated['image_url']);
        unset($validated['existing_image']);

        // Filter empty features
        if (isset($validated['features'])) {
            $validated['features'] = array_filter($validated['features'], fn($f) => !empty(trim($f)));
            $validated['features'] = array_values($validated['features']);
        }

        $heroSlide->update($validated);

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Hero slide updated successfully.');
    }

    /**
     * Delete a hero slide.
     */
    public function destroyHeroSlide(HeroSlide $heroSlide)
    {
        // Delete image if local
        if ($heroSlide->image && !filter_var($heroSlide->image, FILTER_VALIDATE_URL)) {
            $oldPath = str_replace('/storage/', '', $heroSlide->image);
            Storage::disk('public')->delete($oldPath);
        }

        $heroSlide->delete();

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Hero slide deleted successfully.');
    }

    /**
     * Update homepage settings.
     */
    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            // About Section
            'about_badge' => 'nullable|string|max:255',
            'about_title_line1' => 'nullable|string|max:255',
            'about_title_line2' => 'nullable|string|max:255',
            'about_subtitle' => 'nullable|string|max:1000',
            'about_mission_title' => 'nullable|string|max:255',
            'about_mission_text' => 'nullable|string|max:1000',
            'about_story_paragraph1' => 'nullable|string|max:2000',
            'about_story_paragraph2' => 'nullable|string|max:2000',
            'about_key_points' => 'nullable|array',
            'about_feature_cards' => 'nullable|array',
            'about_cta_title' => 'nullable|string|max:255',
            'about_cta_subtitle' => 'nullable|string|max:500',
            'about_cta_primary_text' => 'nullable|string|max:100',
            'about_cta_primary_link' => 'nullable|string|max:500',
            'about_cta_secondary_text' => 'nullable|string|max:100',
            'about_cta_secondary_link' => 'nullable|string|max:500',

            // Why Choose Section
            'why_badge' => 'nullable|string|max:255',
            'why_title_line1' => 'nullable|string|max:255',
            'why_title_line2' => 'nullable|string|max:255',
            'why_subtitle' => 'nullable|string|max:1000',
            'why_feature_cards' => 'nullable|array',
            'why_stats' => 'nullable|array',

            // Dealer Section
            'dealer_badge' => 'nullable|string|max:255',
            'dealer_title_line1' => 'nullable|string|max:255',
            'dealer_title_line2' => 'nullable|string|max:255',
            'dealer_subtitle' => 'nullable|string|max:1000',
            'dealer_benefits' => 'nullable|array',
            'dealer_cta_title' => 'nullable|string|max:255',
            'dealer_cta_subtitle' => 'nullable|string|max:500',
            'dealer_cta_primary_text' => 'nullable|string|max:100',
            'dealer_cta_primary_link' => 'nullable|string|max:500',
            'dealer_cta_secondary_text' => 'nullable|string|max:100',
            'dealer_cta_secondary_link' => 'nullable|string|max:500',

            // Contact Section
            'contact_badge' => 'nullable|string|max:255',
            'contact_title_line1' => 'nullable|string|max:255',
            'contact_title_line2' => 'nullable|string|max:255',
            'contact_subtitle' => 'nullable|string|max:500',
            'contact_email' => 'nullable|string|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_whatsapp' => 'nullable|string|max:50',
            'contact_timing_days' => 'nullable|string|max:255',
            'contact_timing_hours' => 'nullable|string|max:255',
            'contact_address' => 'nullable|string|max:500',
        ]);

        $homepageSettings = HomepageSetting::first();

        if ($homepageSettings) {
            $homepageSettings->update($validated);
        } else {
            HomepageSetting::create($validated);
        }

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Homepage settings updated successfully.');
    }

    /**
     * Reset homepage settings to defaults.
     */
    public function resetSettings()
    {
        $homepageSettings = HomepageSetting::first();

        if ($homepageSettings) {
            $homepageSettings->delete();
        }

        return redirect()->route('admin.homepage.index')
            ->with('success', 'Homepage settings reset to defaults.');
    }
}
