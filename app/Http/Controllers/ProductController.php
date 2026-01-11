<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display the main products page with all parent categories
     */
    public function index()
    {
        $categories = Category::whereNull('parent_id')
            ->where('is_active', true)
            ->orderBy('order')
            ->orderBy('name')
            ->get();

        return Inertia::render('Products/Index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Display a specific category or its subcategories
     */
    public function show($slug)
    {
        $category = Category::where('slug', $slug)
            ->where('is_active', true)
            ->with(['children' => function ($query) {
                $query->where('is_active', true)->orderBy('order')->orderBy('name');
            }])
            ->firstOrFail();

        // If category has children (subcategories), show subcategories page
        if ($category->children->count() > 0) {
            return Inertia::render('Products/Subcategories', [
                'category' => $category,
                'subcategories' => $category->children,
            ]);
        }

        // Otherwise, show products list page
        $products = Product::where('category_id', $category->id)
            ->where('is_active', true)
            ->orderBy('order')
            ->orderBy('name')
            ->get();

        return Inertia::render('Products/Category', [
            'categorySlug' => $category->slug,
            'categoryData' => $category->load('parent'),
            'products' => $products,
        ]);
    }

    /**
     * Display products for a subcategory
     */
    public function showSubcategory($parentSlug, $childSlug)
    {
        $parentCategory = Category::where('slug', $parentSlug)
            ->where('is_active', true)
            ->firstOrFail();

        $category = Category::where('slug', $childSlug)
            ->where('parent_id', $parentCategory->id)
            ->where('is_active', true)
            ->firstOrFail();

        $products = Product::where('category_id', $category->id)
            ->where('is_active', true)
            ->orderBy('order')
            ->orderBy('name')
            ->get();

        return Inertia::render('Products/Category', [
            'categorySlug' => $category->slug,
            'categoryData' => $category->load('parent'),
            'products' => $products,
        ]);
    }

    /**
     * Display product detail page
     */
    public function showProduct($categorySlug, $productSlug)
    {
        $category = Category::where('slug', $categorySlug)
            ->where('is_active', true)
            ->first();

        if (!$category) {
            abort(404);
        }

        $product = Product::where('slug', $productSlug)
            ->where('category_id', $category->id)
            ->where('is_active', true)
            ->with('category')
            ->firstOrFail();

        // Format product data for the frontend
        $productData = [
            'name' => $product->name,
            'slug' => $product->slug,
            'category' => $category->slug,
            'categoryName' => $category->name,
            'description' => $product->description,
            'images' => $product->images ?? [],
            'features' => $product->features ?? [],
            'specifications' => $product->specifications ?? [],
            'faqs' => $product->faqs ?? [],
        ];

        return Inertia::render('Products/Detail', [
            'product' => $productData
        ]);
    }
}
