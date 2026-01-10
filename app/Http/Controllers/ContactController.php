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
            'page_source' => 'required|in:contact,support,home',
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
            'email' => 'required|email|max:255|unique:newsletter_subscriptions,email',
        ]);

        NewsletterSubscription::create([
            'email' => $validated['email'],
        ]);

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}
