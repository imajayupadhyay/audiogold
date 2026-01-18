<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        // About Section
        'about_badge',
        'about_title_line1',
        'about_title_line2',
        'about_subtitle',
        'about_mission_title',
        'about_mission_text',
        'about_story_paragraph1',
        'about_story_paragraph2',
        'about_key_points',
        'about_feature_cards',
        'about_cta_title',
        'about_cta_subtitle',
        'about_cta_primary_text',
        'about_cta_primary_link',
        'about_cta_secondary_text',
        'about_cta_secondary_link',

        // Why Choose Section
        'why_badge',
        'why_title_line1',
        'why_title_line2',
        'why_subtitle',
        'why_feature_cards',
        'why_stats',

        // Dealer Section
        'dealer_badge',
        'dealer_title_line1',
        'dealer_title_line2',
        'dealer_subtitle',
        'dealer_benefits',
        'dealer_cta_title',
        'dealer_cta_subtitle',
        'dealer_cta_primary_text',
        'dealer_cta_primary_link',
        'dealer_cta_secondary_text',
        'dealer_cta_secondary_link',

        // Contact Section
        'contact_badge',
        'contact_title_line1',
        'contact_title_line2',
        'contact_subtitle',
        'contact_email',
        'contact_phone',
        'contact_whatsapp',
        'contact_timing_days',
        'contact_timing_hours',
        'contact_address',
    ];

    protected $casts = [
        'about_key_points' => 'array',
        'about_feature_cards' => 'array',
        'why_feature_cards' => 'array',
        'why_stats' => 'array',
        'dealer_benefits' => 'array',
    ];

    /**
     * Get the homepage settings or return default values
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
     * Get default homepage values
     */
    public static function getDefaults()
    {
        return [
            // About Section
            'about_badge' => 'About AudioGold',
            'about_title_line1' => 'Who We Are',
            'about_title_line2' => 'Your Sound, Amplified',
            'about_subtitle' => 'Redefining professional audio with innovation, quality, and affordability',
            'about_mission_title' => 'Our Mission',
            'about_mission_text' => 'Making premium professional audio technology accessible to everyone across India',
            'about_story_paragraph1' => 'At AudioGold, we combine global expertise with local innovation to create products that meet the unique demands of the Indian market.',
            'about_story_paragraph2' => 'Our unwavering commitment to quality, affordability, and performance makes us the trusted choice for professionals nationwide. From live sound reinforcement to studio recording, we deliver excellence in every product.',
            'about_key_points' => [
                ['title' => 'Global Standards', 'description' => 'International quality benchmarks'],
                ['title' => 'Local Innovation', 'description' => 'Made for Indian market needs'],
                ['title' => 'Expert Support', 'description' => 'Dedicated technical assistance'],
                ['title' => 'Trusted Brand', 'description' => 'Industry-proven reliability'],
            ],
            'about_feature_cards' => [
                ['title' => 'Innovation', 'description' => 'Cutting-edge technology meets creative design in every product', 'gradient' => 'from-purple-500 to-pink-600', 'bg_gradient' => 'from-purple-50 to-pink-50', 'border' => 'border-purple-100'],
                ['title' => 'Quality First', 'description' => 'Premium standards guaranteed in every product we deliver', 'gradient' => 'from-blue-500 to-cyan-600', 'bg_gradient' => 'from-blue-50 to-cyan-50', 'border' => 'border-blue-100'],
                ['title' => 'Professional Grade', 'description' => 'Expert solutions trusted by audio professionals nationwide', 'gradient' => 'from-emerald-500 to-teal-600', 'bg_gradient' => 'from-emerald-50 to-teal-50', 'border' => 'border-emerald-100'],
                ['title' => 'Trusted Support', 'description' => 'Your reliable partner with dedicated customer service', 'gradient' => 'from-orange-500 to-amber-600', 'bg_gradient' => 'from-orange-50 to-amber-50', 'border' => 'border-orange-100'],
            ],
            'about_cta_title' => 'Ready to Experience Premium Audio?',
            'about_cta_subtitle' => "Join thousands of satisfied customers and discover why AudioGold is India's trusted choice",
            'about_cta_primary_text' => 'Explore Products',
            'about_cta_primary_link' => '/products',
            'about_cta_secondary_text' => 'Contact Us',
            'about_cta_secondary_link' => '/contact',

            // Why Choose Section
            'why_badge' => 'Why Choose Us',
            'why_title_line1' => 'Excellence in Every',
            'why_title_line2' => 'Audio Solution',
            'why_subtitle' => 'Discover what makes AudioGold the preferred choice for audio professionals across India',
            'why_feature_cards' => [
                [
                    'title' => 'Premium Quality at Affordable Prices',
                    'gradient' => 'from-blue-500 to-cyan-600',
                    'bg_gradient' => 'from-blue-50 to-cyan-50',
                    'features' => [
                        'Professional-grade products designed for all budgets',
                        'Cutting-edge technology tailored for Indian needs',
                    ],
                ],
                [
                    'title' => 'Exceptional Support',
                    'gradient' => 'from-emerald-500 to-teal-600',
                    'bg_gradient' => 'from-emerald-50 to-teal-50',
                    'features' => [
                        'Comprehensive assistance from purchase to setup and beyond',
                        'Collaborating worldwide to deliver excellence locally',
                    ],
                ],
            ],
            'why_stats' => [
                ['value' => '1000+', 'label' => 'Happy Customers', 'gradient' => 'from-blue-600 to-cyan-600', 'bg_gradient' => 'from-blue-50 to-cyan-50', 'border' => 'border-blue-100'],
                ['value' => '50+', 'label' => 'Products', 'gradient' => 'from-emerald-600 to-teal-600', 'bg_gradient' => 'from-emerald-50 to-teal-50', 'border' => 'border-emerald-100'],
                ['value' => '24/7', 'label' => 'Support', 'gradient' => 'from-orange-600 to-amber-600', 'bg_gradient' => 'from-orange-50 to-amber-50', 'border' => 'border-orange-100'],
                ['value' => '100%', 'label' => 'Satisfaction', 'gradient' => 'from-purple-600 to-pink-600', 'bg_gradient' => 'from-purple-50 to-pink-50', 'border' => 'border-purple-100'],
            ],

            // Dealer Section
            'dealer_badge' => 'Partnership Opportunity',
            'dealer_title_line1' => 'Become Our',
            'dealer_title_line2' => 'Authorized Dealer',
            'dealer_subtitle' => 'Join the AudioGold family and unlock a world of opportunities with high-quality products, competitive pricing, and unmatched support',
            'dealer_benefits' => [
                ['title' => 'Competitive Pricing', 'description' => 'Get the best wholesale rates in the market with attractive margins and flexible payment terms', 'gradient' => 'from-green-500 to-emerald-600', 'bg_gradient' => 'from-green-50 to-emerald-50'],
                ['title' => 'Premium Products', 'description' => 'Access to our complete range of professional-grade audio equipment and latest releases', 'gradient' => 'from-blue-500 to-cyan-600', 'bg_gradient' => 'from-blue-50 to-cyan-50'],
                ['title' => 'Full Support', 'description' => 'Complete technical assistance, marketing materials, and dedicated account management', 'gradient' => 'from-purple-500 to-pink-600', 'bg_gradient' => 'from-purple-50 to-pink-50'],
            ],
            'dealer_cta_title' => 'Ready to Partner with Us?',
            'dealer_cta_subtitle' => 'Together, we can deliver superior audio solutions to every corner of India',
            'dealer_cta_primary_text' => 'Contact Us Now',
            'dealer_cta_primary_link' => '#contact',
            'dealer_cta_secondary_text' => 'WhatsApp Us',
            'dealer_cta_secondary_link' => 'https://wa.me/917011651721?text=Hi, I\'m interested in becoming an AudioGold dealer',

            // Contact Section
            'contact_badge' => 'Get In Touch',
            'contact_title_line1' => 'Have a Question?',
            'contact_title_line2' => "We're Here to Help",
            'contact_subtitle' => "Fill out the form below, and we'll get back to you within 24 hours",
            'contact_email' => 'shivamelectronics7@gmail.com',
            'contact_phone' => '+91 7011651721',
            'contact_whatsapp' => '+91 7011651721',
            'contact_timing_days' => 'Monday to Saturday',
            'contact_timing_hours' => '9:00 AM – 6:00 PM',
            'contact_address' => 'A-64 Roop nagar industrial area, Loni Ghaziabad',
        ];
    }
}
