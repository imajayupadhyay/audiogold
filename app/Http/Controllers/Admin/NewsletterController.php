<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewsletterController extends Controller
{
    /**
     * Display a listing of newsletter subscriptions.
     */
    public function index(Request $request)
    {
        $query = NewsletterSubscription::query()->latest();

        // Filter by subscription status
        if ($request->filled('status')) {
            $isSubscribed = $request->status === 'subscribed';
            $query->where('is_subscribed', $isSubscribed);
        }

        // Search
        if ($request->filled('search')) {
            $query->where('email', 'like', "%{$request->search}%");
        }

        $subscriptions = $query->paginate(15)->withQueryString();

        return Inertia::render('Admin/Newsletter/Index', [
            'subscriptions' => $subscriptions,
            'filters' => $request->only(['status', 'search']),
        ]);
    }

    /**
     * Toggle subscription status.
     */
    public function toggleStatus(NewsletterSubscription $subscription)
    {
        $subscription->update(['is_subscribed' => !$subscription->is_subscribed]);

        return back()->with('success', 'Subscription status updated successfully.');
    }

    /**
     * Remove the specified subscription.
     */
    public function destroy(NewsletterSubscription $subscription)
    {
        $subscription->delete();

        return redirect()->route('admin.newsletter.index')
            ->with('success', 'Subscription deleted successfully.');
    }
}
