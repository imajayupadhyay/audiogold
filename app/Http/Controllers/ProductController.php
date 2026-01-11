<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

        // Otherwise, show products page (will need products later)
        return Inertia::render('Products/Category', [
            'categorySlug' => $category->slug,
            'categoryData' => $category,
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

        return Inertia::render('Products/Category', [
            'categorySlug' => $category->slug,
            'categoryData' => $category,
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

        // Helper function to generate default product data
        $generateDefaultProduct = function($slug, $category) {
            $categoryNames = [
                'booster-amplifiers' => 'Booster Amplifiers',
                'mixer-amplifiers' => 'Mixer Amplifiers',
                'class-ab' => 'Class AB Amplifiers',
                'class-h' => 'Class H Amplifiers',
            ];

            $productName = strtoupper(str_replace('-', ' ', $slug));

            return [
                'name' => $productName,
                'slug' => $slug,
                'category' => $category->slug,
                'categoryName' => $category->name,
                'description' => 'Professional-grade audio amplifier with superior sound quality and reliability. Engineered for commercial installations, public address systems, and professional audio applications with advanced features and exceptional performance.',
                'images' => [
                    'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=800&h=800&fit=crop',
                ],
                'features' => [
                    'Professional-grade audio amplification with minimal distortion',
                    'Built-in protection circuits for overload and short circuit',
                    'Multiple input options for versatile connectivity',
                    'Energy-efficient design with low power consumption',
                    'Durable construction for long-lasting performance',
                    'Easy installation and user-friendly controls',
                    'Advanced thermal management system',
                    'Rack-mountable design for professional installations'
                ],
                'specifications' => [
                    ['label' => 'Model', 'value' => $productName],
                    ['label' => 'Output Power', 'value' => 'High Performance'],
                    ['label' => 'Frequency Response', 'value' => '20Hz - 20kHz'],
                    ['label' => 'Input Sensitivity', 'value' => '775mV'],
                    ['label' => 'Signal to Noise Ratio', 'value' => '>90dB'],
                    ['label' => 'Total Harmonic Distortion', 'value' => '<0.5%'],
                    ['label' => 'Input Impedance', 'value' => '10kΩ'],
                    ['label' => 'Output Impedance', 'value' => '4-16Ω'],
                    ['label' => 'Power Supply', 'value' => 'AC 220V ±10%, 50Hz'],
                    ['label' => 'Dimensions', 'value' => 'Standard Rack Size'],
                    ['label' => 'Certification', 'value' => 'CE Certified'],
                ],
                'faqs' => [
                    [
                        'question' => 'What is the warranty period for this amplifier?',
                        'answer' => 'All our amplifiers come with a comprehensive 2-year warranty covering manufacturing defects and component failures. We also provide lifetime technical support for all our products.'
                    ],
                    [
                        'question' => 'Can this amplifier be used for outdoor installations?',
                        'answer' => 'Yes, this amplifier can be used for outdoor installations when properly housed in a weatherproof enclosure. We recommend protecting the unit from direct exposure to rain, moisture, and extreme temperatures.'
                    ],
                    [
                        'question' => 'What speakers are compatible with this amplifier?',
                        'answer' => 'This amplifier supports speakers with impedance ranging from 4Ω to 16Ω. We recommend using high-quality speakers with appropriate power handling capacity for optimal performance.'
                    ],
                    [
                        'question' => 'Is installation service available?',
                        'answer' => 'Yes, we provide professional installation services across India. Our expert technicians can help with system design, installation, and configuration. Contact us for a customized quote.'
                    ],
                    [
                        'question' => 'Do you provide technical specifications document?',
                        'answer' => 'Yes, detailed technical specifications and user manuals are available. Please contact us via WhatsApp or email, and we will send you the complete documentation for this product.'
                    ],
                ]
            ];
        };

        $product = $generateDefaultProduct($productSlug, $category);

        return Inertia::render('Products/Detail', [
            'product' => $product
        ]);
    }
}
