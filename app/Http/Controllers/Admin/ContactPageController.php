<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPageSetting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactPageController extends Controller
{
    /**
     * Display the contact page settings.
     */
    public function index()
    {
        $contactSettings = ContactPageSetting::first();
        $defaults = ContactPageSetting::getDefaults();

        return Inertia::render('Admin/ContactPage/Index', [
            'contactSettings' => $contactSettings,
            'defaults' => $defaults,
        ]);
    }

    /**
     * Update the contact page settings.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title_line1' => 'nullable|string|max:255',
            'title_line2' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'email' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'timing_days' => 'nullable|string|max:255',
            'timing_hours' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:500',
        ]);

        $contactSettings = ContactPageSetting::first();

        if ($contactSettings) {
            $contactSettings->update($validated);
        } else {
            ContactPageSetting::create($validated);
        }

        return redirect()->route('admin.contact-page.index')
            ->with('success', 'Contact page settings updated successfully.');
    }

    /**
     * Reset contact page settings to defaults.
     */
    public function reset()
    {
        $contactSettings = ContactPageSetting::first();

        if ($contactSettings) {
            $contactSettings->delete();
        }

        return redirect()->route('admin.contact-page.index')
            ->with('success', 'Contact page settings reset to defaults.');
    }
}
