<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportPageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        // Hero Section
        'hero_badge',
        'hero_title',
        'hero_subtitle',

        // Quick Support Options
        'quick_support_options',

        // Self-Help Resources Section
        'self_help_title',
        'self_help_subtitle',
        'self_help_resources',

        // Product Support Section
        'product_support_title',
        'product_support_subtitle',
        'product_support_cards',

        // Video Tutorials Section
        'video_title',
        'video_subtitle',
        'video_button_text',
        'video_button_link',

        // Warranty Section
        'warranty_title',
        'warranty_subtitle',
        'warranty_features',
        'warranty_link_text',

        // Order Support Section
        'order_title',
        'order_subtitle',
        'order_features',
        'order_link_text',

        // Contact Form Section
        'contact_title',
        'contact_subtitle',

        // Contact Information
        'email',
        'phone',
        'whatsapp',
        'timing_days',
        'timing_hours',
        'address',
    ];

    protected $casts = [
        'quick_support_options' => 'array',
        'self_help_resources' => 'array',
        'product_support_cards' => 'array',
        'warranty_features' => 'array',
        'order_features' => 'array',
    ];

    /**
     * Get the support page settings or return default values
     */
    public static function getSettings()
    {
        $settings = self::first();

        if (!$settings) {
            return self::getDefaults();
        }

        $data = $settings->toArray();

        // Merge with defaults for any null values
        $defaults = self::getDefaults();
        foreach ($defaults as $key => $value) {
            if (!isset($data[$key]) || $data[$key] === null || $data[$key] === '') {
                $data[$key] = $value;
            }
        }

        return $data;
    }

    /**
     * Get default support page values
     */
    public static function getDefaults()
    {
        return [
            // Hero Section
            'hero_badge' => 'Customer Support',
            'hero_title' => "We're Here to Help!",
            'hero_subtitle' => 'At Audio Gold, customer satisfaction is our top priority. Whether you need technical assistance, product information, or help with an order, our dedicated support team is ready to assist you.',

            // Quick Support Options
            'quick_support_options' => [
                [
                    'title' => 'Email Support',
                    'description' => 'Get help via email',
                    'link' => '#contact-form',
                    'gradient' => 'from-blue-500 to-cyan-600',
                    'icon' => 'email'
                ],
                [
                    'title' => 'Phone Support',
                    'description' => 'Call us directly',
                    'link' => 'tel:+917011651721',
                    'gradient' => 'from-green-500 to-emerald-600',
                    'icon' => 'phone'
                ],
                [
                    'title' => 'WhatsApp',
                    'description' => 'Chat with us',
                    'link' => 'https://wa.me/917011651721',
                    'gradient' => 'from-purple-500 to-pink-600',
                    'icon' => 'whatsapp'
                ],
                [
                    'title' => 'Self-Help',
                    'description' => 'Browse resources',
                    'link' => '#self-help',
                    'gradient' => 'from-orange-500 to-amber-600',
                    'icon' => 'info'
                ]
            ],

            // Self-Help Resources Section
            'self_help_title' => 'Self-Help Resources',
            'self_help_subtitle' => 'Find answers quickly with our comprehensive resources',
            'self_help_resources' => [
                [
                    'title' => 'Support Library',
                    'description' => 'Explore our library of product manuals, quick-start guides, and troubleshooting tips.',
                    'link_text' => 'Browse Library',
                    'link' => '#',
                    'gradient' => 'from-indigo-500 to-purple-600'
                ],
                [
                    'title' => 'Knowledge Base',
                    'description' => 'Find detailed articles and solutions for common issues in our comprehensive knowledge base.',
                    'link_text' => 'Visit Knowledge Base',
                    'link' => '#',
                    'gradient' => 'from-rose-500 to-pink-600'
                ]
            ],

            // Product Support Section
            'product_support_title' => 'Product Support',
            'product_support_subtitle' => 'Having trouble with your Audio Gold product? Explore our resources or contact our experts for guidance.',
            'product_support_cards' => [
                [
                    'title' => 'Product Manuals',
                    'description' => 'Download user guides and manuals from our Support Library',
                    'link_text' => 'Download →',
                    'link' => '#',
                    'gradient' => 'from-teal-500 to-emerald-600'
                ],
                [
                    'title' => 'FAQs',
                    'description' => 'Visit our FAQ Page for answers to common questions',
                    'link_text' => 'View FAQs →',
                    'link' => '/faq',
                    'gradient' => 'from-amber-500 to-orange-600'
                ],
                [
                    'title' => 'Technical Assistance',
                    'description' => 'Contact us for troubleshooting and setup support',
                    'link_text' => 'Get Help →',
                    'link' => '#contact-form',
                    'gradient' => 'from-violet-500 to-purple-600'
                ]
            ],

            // Video Tutorials Section
            'video_title' => 'Video Tutorials',
            'video_subtitle' => 'Learn how to get the most out of your Audio Gold products with our step-by-step video guides.',
            'video_button_text' => 'Watch Tutorials',
            'video_button_link' => '#',

            // Warranty Section
            'warranty_title' => 'Warranty and Repairs',
            'warranty_subtitle' => 'Your peace of mind matters to us',
            'warranty_features' => [
                'Comprehensive warranty coverage on all products',
                'Quick and reliable repair services',
                'Genuine parts and certified technicians',
                'Easy warranty claim process'
            ],
            'warranty_link_text' => 'Submit Warranty Claim',

            // Order Support Section
            'order_title' => 'Order Support',
            'order_subtitle' => 'Track and manage your orders',
            'order_features' => [
                'Track your order status in real-time',
                'Modify or cancel orders before shipment',
                'Easy returns and exchanges within 7 days',
                'Billing and invoice support'
            ],
            'order_link_text' => 'Contact Order Support',

            // Contact Form Section
            'contact_title' => 'Get in Touch With Audio Gold',
            'contact_subtitle' => "Fill out the form below, and we'll get back to you within 24 hours.",

            // Contact Information
            'email' => 'shivamelectronics7@gmail.com',
            'phone' => '+91 7011651721',
            'whatsapp' => '+91 7011651721',
            'timing_days' => 'Monday to Saturday',
            'timing_hours' => '9:00 AM – 6:00 PM',
            'address' => "A-64 Roop nagar industrial area\nLoni Ghaziabad",
        ];
    }
}
