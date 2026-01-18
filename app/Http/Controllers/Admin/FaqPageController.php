<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqPageSetting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FaqPageController extends Controller
{
    /**
     * Display the FAQ page settings.
     */
    public function index()
    {
        $faqSettings = FaqPageSetting::first();
        $defaults = FaqPageSetting::getDefaults();

        return Inertia::render('Admin/FaqPage/Index', [
            'faqSettings' => $faqSettings,
            'defaults' => $defaults,
        ]);
    }

    /**
     * Update the FAQ page settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            // Hero Section
            'hero_badge' => 'nullable|string|max:255',
            'hero_title_line1' => 'nullable|string|max:255',
            'hero_title_line2' => 'nullable|string|max:255',
            'hero_subtitle' => 'nullable|string|max:1000',

            // FAQ Categories
            'categories' => 'nullable|array',
            'categories.*.id' => 'required|string|max:50',
            'categories.*.name' => 'required|string|max:255',

            // FAQs
            'faqs' => 'nullable|array',

            // Quick Actions
            'quick_actions' => 'nullable|array',
            'quick_actions.*.title' => 'nullable|string|max:255',
            'quick_actions.*.description' => 'nullable|string|max:500',
            'quick_actions.*.link_text' => 'nullable|string|max:100',
            'quick_actions.*.link' => 'nullable|string|max:500',
            'quick_actions.*.gradient' => 'nullable|string|max:255',
            'quick_actions.*.icon' => 'nullable|string|max:50',

            // CTA Section
            'cta_title' => 'nullable|string|max:255',
            'cta_subtitle' => 'nullable|string|max:500',
            'cta_primary_text' => 'nullable|string|max:100',
            'cta_primary_link' => 'nullable|string|max:500',
            'cta_secondary_text' => 'nullable|string|max:100',
            'cta_secondary_link' => 'nullable|string|max:500',
        ]);

        $faqSettings = FaqPageSetting::first();

        if ($faqSettings) {
            $faqSettings->update($validated);
        } else {
            FaqPageSetting::create($validated);
        }

        return redirect()->route('admin.faq-page.index')
            ->with('success', 'FAQ page settings updated successfully.');
    }

    /**
     * Reset FAQ page settings to defaults.
     */
    public function reset()
    {
        $faqSettings = FaqPageSetting::first();

        if ($faqSettings) {
            $faqSettings->delete();
        }

        return redirect()->route('admin.faq-page.index')
            ->with('success', 'FAQ page settings reset to defaults.');
    }
}
