<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a contact inquiry
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'message' => 'nullable|string|max:180',
            'page_source' => 'required|in:contact,support,home,get_quote',
        ]);

        ContactInquiry::create([
            'first_name' => $validated['firstName'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'message' => $validated['message'] ?? null,
            'page_source' => $validated['page_source'],
        ]);

        return back()->with('success', 'Thank you for your message! We will get back to you within 24 hours.');
    }

    /**
     * Subscribe to newsletter
     */
    public function subscribeNewsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        // Check if email already exists
        $existingSubscription = NewsletterSubscription::where('email', $validated['email'])->first();

        if ($existingSubscription) {
            if ($existingSubscription->is_subscribed) {
                return back()->with('error', 'This email is already subscribed to our newsletter!');
            } else {
                // Reactivate subscription
                $existingSubscription->update(['is_subscribed' => true]);
                return back()->with('success', 'Welcome back! Your subscription has been reactivated.');
            }
        }

        NewsletterSubscription::create([
            'email' => $validated['email'],
        ]);

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
