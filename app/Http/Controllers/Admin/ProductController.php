<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Search filter
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        $products = $query->orderBy('order')
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        $categories = Category::orderBy('name')->get(['id', 'name']);

        return Inertia::render('Admin/Products/Index', [
            'products' => $products,
            'categories' => $categories,
            'filters' => [
                'search' => $request->search,
                'category' => $request->category,
                'status' => $request->status,
            ],
        ]);
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        return Inertia::render('Admin/Products/Create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_urls' => 'nullable|array',
            'image_urls.*' => 'nullable|url|max:500',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
            'specifications' => 'nullable|array',
            'specifications.*.label' => 'nullable|string|max:255',
            'specifications.*.value' => 'nullable|string|max:255',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string|max:500',
            'faqs.*.answer' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Ensure slug is unique
        $originalSlug = $validated['slug'];
        $counter = 1;
        while (Product::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Handle image uploads
        $imageArray = [];

        // Process uploaded files
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('products', $imageName, 'public');
                $imageArray[] = Storage::url($path);
            }
        }

        // Process image URLs
        if (!empty($validated['image_urls'])) {
            foreach ($validated['image_urls'] as $url) {
                if (!empty(trim($url))) {
                    $imageArray[] = $url;
                }
            }
        }

        $validated['images'] = !empty($imageArray) ? $imageArray : null;
        unset($validated['image_urls']);

        // Filter empty features
        if (isset($validated['features'])) {
            $validated['features'] = array_filter($validated['features'], function($feature) {
                return !empty(trim($feature));
            });
            $validated['features'] = array_values($validated['features']);
        }

        // Filter empty specifications
        if (isset($validated['specifications'])) {
            $validated['specifications'] = array_filter($validated['specifications'], function($spec) {
                return !empty(trim($spec['label'])) && !empty(trim($spec['value']));
            });
            $validated['specifications'] = array_values($validated['specifications']);
        }

        // Filter empty FAQs
        if (isset($validated['faqs'])) {
            $validated['faqs'] = array_filter($validated['faqs'], function($faq) {
                return !empty(trim($faq['question'])) && !empty(trim($faq['answer']));
            });
            $validated['faqs'] = array_values($validated['faqs']);
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get(['id', 'name']);

        return Inertia::render('Admin/Products/Edit', [
            'product' => $product->load('category'),
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:products,slug,' . $product->id,
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'image_urls' => 'nullable|array',
            'image_urls.*' => 'nullable|url|max:500',
            'existing_images' => 'nullable|array',
            'existing_images.*' => 'nullable|string',
            'features' => 'nullable|array',
            'features.*' => 'nullable|string|max:255',
            'specifications' => 'nullable|array',
            'specifications.*.label' => 'nullable|string|max:255',
            'specifications.*.value' => 'nullable|string|max:255',
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'nullable|string|max:500',
            'faqs.*.answer' => 'nullable|string',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Auto-generate slug if not provided
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Ensure slug is unique (excluding current product)
        $originalSlug = $validated['slug'];
        $counter = 1;
        while (Product::where('slug', $validated['slug'])->where('id', '!=', $product->id)->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Handle image updates
        $imageArray = [];

        // Keep existing images that weren't removed
        if (!empty($validated['existing_images'])) {
            $imageArray = $validated['existing_images'];
        }

        // Process new uploaded files
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('products', $imageName, 'public');
                $imageArray[] = Storage::url($path);
            }
        }

        // Process new image URLs
        if (!empty($validated['image_urls'])) {
            foreach ($validated['image_urls'] as $url) {
                if (!empty(trim($url))) {
                    $imageArray[] = $url;
                }
            }
        }

        $validated['images'] = !empty($imageArray) ? $imageArray : null;
        unset($validated['image_urls']);
        unset($validated['existing_images']);

        // Filter empty features
        if (isset($validated['features'])) {
            $validated['features'] = array_filter($validated['features'], function($feature) {
                return !empty(trim($feature));
            });
            $validated['features'] = array_values($validated['features']);
        }

        // Filter empty specifications
        if (isset($validated['specifications'])) {
            $validated['specifications'] = array_filter($validated['specifications'], function($spec) {
                return !empty(trim($spec['label'])) && !empty(trim($spec['value']));
            });
            $validated['specifications'] = array_values($validated['specifications']);
        }

        // Filter empty FAQs
        if (isset($validated['faqs'])) {
            $validated['faqs'] = array_filter($validated['faqs'], function($faq) {
                return !empty(trim($faq['question'])) && !empty(trim($faq['answer']));
            });
            $validated['faqs'] = array_values($validated['faqs']);
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        // Delete associated images from storage
        if ($product->images) {
            foreach ($product->images as $image) {
                if (!filter_var($image, FILTER_VALIDATE_URL)) {
                    $oldPath = str_replace('/storage/', '', $image);
                    Storage::disk('public')->delete($oldPath);
                }
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
