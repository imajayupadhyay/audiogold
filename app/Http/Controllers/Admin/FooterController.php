<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class FooterController extends Controller
{
    /**
     * Display the footer settings page.
     */
    public function index()
    {
        $footerSettings = FooterSetting::first();
        $defaults = FooterSetting::getDefaults();

        return Inertia::render('Admin/Footer/Index', [
            'footerSettings' => $footerSettings,
            'defaults' => $defaults,
        ]);
    }

    /**
     * Update the footer settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'newsletter_title' => 'nullable|string|max:255',
            'newsletter_subtitle' => 'nullable|string|max:255',
            'company_description' => 'nullable|string|max:1000',
            'facebook_url' => 'nullable|string|max:500',
            'twitter_url' => 'nullable|string|max:500',
            'instagram_url' => 'nullable|string|max:500',
            'youtube_url' => 'nullable|string|max:500',
            'useful_links' => 'nullable|array',
            'useful_links.*.label' => 'nullable|string|max:255',
            'useful_links.*.url' => 'nullable|string|max:500',
            'contact_email' => 'nullable|string|email|max:255',
            'contact_phone' => 'nullable|string|max:50',
            'contact_address' => 'nullable|string|max:500',
            'copyright_text' => 'nullable|string|max:255',
        ]);

        // Filter out empty useful_links entries
        if (isset($validated['useful_links'])) {
            $validated['useful_links'] = array_filter($validated['useful_links'], function ($link) {
                return !empty($link['label']) && !empty($link['url']);
            });
            $validated['useful_links'] = array_values($validated['useful_links']);
        }

        $footerSettings = FooterSetting::first();

        if ($footerSettings) {
            $footerSettings->update($validated);
        } else {
            FooterSetting::create($validated);
        }

        return redirect()->route('admin.footer.index')
            ->with('success', 'Footer settings updated successfully.');
    }

    /**
     * Reset footer settings to defaults.
     */
    public function reset()
    {
        $footerSettings = FooterSetting::first();

        if ($footerSettings) {
            $footerSettings->delete();
        }

        return redirect()->route('admin.footer.index')
            ->with('success', 'Footer settings reset to defaults.');
    }
}
