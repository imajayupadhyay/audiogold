<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InquiryController extends Controller
{
    /**
     * Display a listing of inquiries.
     */
    public function index(Request $request)
    {
        $query = ContactInquiry::query()->latest();

        // Filter by page source
        if ($request->filled('source')) {
            $query->where('page_source', $request->source);
        }

        // Filter by read status
        if ($request->filled('status')) {
            $isRead = $request->status === 'read';
            $query->where('is_read', $isRead);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $inquiries = $query->paginate(10)->withQueryString();

        return Inertia::render('Admin/Inquiries/Index', [
            'inquiries' => $inquiries,
            'filters' => $request->only(['source', 'status', 'search']),
        ]);
    }

    /**
     * Display the specified inquiry.
     */
    public function show(ContactInquiry $inquiry)
    {
        // Mark as read
        if (!$inquiry->is_read) {
            $inquiry->update(['is_read' => true]);
        }

        return Inertia::render('Admin/Inquiries/Show', [
            'inquiry' => $inquiry,
        ]);
    }

    /**
     * Toggle read status of inquiry.
     */
    public function toggleRead(ContactInquiry $inquiry)
    {
        $inquiry->update(['is_read' => !$inquiry->is_read]);

        return back()->with('success', 'Inquiry status updated successfully.');
    }

    /**
     * Remove the specified inquiry.
     */
    public function destroy(ContactInquiry $inquiry)
    {
        $inquiry->delete();

        return redirect()->route('admin.inquiries.index')
            ->with('success', 'Inquiry deleted successfully.');
    }
}
