<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SupportPageSetting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SupportPageController extends Controller
{
    /**
     * Display the support page settings.
     */
    public function index()
    {
        $supportSettings = SupportPageSetting::first();
        $defaults = SupportPageSetting::getDefaults();

        return Inertia::render('Admin/SupportPage/Index', [
            'supportSettings' => $supportSettings,
            'defaults' => $defaults,
        ]);
    }

    /**
     * Update the support page settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            // Hero Section
            'hero_badge' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:1000',

            // Quick Support Options
            'quick_support_options' => 'nullable|array',
            'quick_support_options.*.title' => 'nullable|string|max:255',
            'quick_support_options.*.description' => 'nullable|string|max:255',
            'quick_support_options.*.link' => 'nullable|string|max:500',
            'quick_support_options.*.gradient' => 'nullable|string|max:255',
            'quick_support_options.*.icon' => 'nullable|string|max:50',

            // Self-Help Resources Section
            'self_help_title' => 'nullable|string|max:255',
            'self_help_subtitle' => 'nullable|string|max:500',
            'self_help_resources' => 'nullable|array',
            'self_help_resources.*.title' => 'nullable|string|max:255',
            'self_help_resources.*.description' => 'nullable|string|max:500',
            'self_help_resources.*.link_text' => 'nullable|string|max:100',
            'self_help_resources.*.link' => 'nullable|string|max:500',
            'self_help_resources.*.gradient' => 'nullable|string|max:255',

            // Product Support Section
            'product_support_title' => 'nullable|string|max:255',
            'product_support_subtitle' => 'nullable|string|max:500',
            'product_support_cards' => 'nullable|array',
            'product_support_cards.*.title' => 'nullable|string|max:255',
            'product_support_cards.*.description' => 'nullable|string|max:500',
            'product_support_cards.*.link_text' => 'nullable|string|max:100',
            'product_support_cards.*.link' => 'nullable|string|max:500',
            'product_support_cards.*.gradient' => 'nullable|string|max:255',

            // Video Tutorials Section
            'video_title' => 'nullable|string|max:255',
            'video_subtitle' => 'nullable|string|max:500',
            'video_button_text' => 'nullable|string|max:100',
            'video_button_link' => 'nullable|string|max:500',

            // Warranty Section
            'warranty_title' => 'nullable|string|max:255',
            'warranty_subtitle' => 'nullable|string|max:255',
            'warranty_features' => 'nullable|array',
            'warranty_features.*' => 'nullable|string|max:255',
            'warranty_link_text' => 'nullable|string|max:100',

            // Order Support Section
            'order_title' => 'nullable|string|max:255',
            'order_subtitle' => 'nullable|string|max:255',
            'order_features' => 'nullable|array',
            'order_features.*' => 'nullable|string|max:255',
            'order_link_text' => 'nullable|string|max:100',

            // Contact Form Section
            'contact_title' => 'nullable|string|max:255',
            'contact_subtitle' => 'nullable|string|max:500',

            // Contact Information
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'timing_days' => 'nullable|string|max:255',
            'timing_hours' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
        ]);

        $supportSettings = SupportPageSetting::first();

        if ($supportSettings) {
            $supportSettings->update($validated);
        } else {
            SupportPageSetting::create($validated);
        }

        return redirect()->route('admin.support-page.index')
            ->with('success', 'Support page settings updated successfully.');
    }

    /**
     * Reset support page settings to defaults.
     */
    public function reset()
    {
        $supportSettings = SupportPageSetting::first();

        if ($supportSettings) {
            $supportSettings->delete();
        }

        return redirect()->route('admin.support-page.index')
            ->with('success', 'Support page settings reset to defaults.');
    }
}
