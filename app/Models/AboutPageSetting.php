<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutPageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        // Hero Section
        'hero_badge',
        'hero_title_line1',
        'hero_title_line2',
        'hero_subtitle',

        // Story Section
        'story_title',
        'story_content',
        'mission_title',
        'mission_content',

        // Values Section
        'values_title',
        'values_subtitle',
        'values',

        // Stats Section
        'stats',

        // Team Section
        'team_title',
        'team_subtitle',
        'team_members',

        // Innovation Section
        'innovation_title',
        'innovation_content',
        'innovations',
        'innovation_stats',

        // CTA Section
        'cta_title',
        'cta_subtitle',
        'cta_primary_text',
        'cta_primary_link',
        'cta_secondary_text',
        'cta_secondary_link',
    ];

    protected $casts = [
        'values' => 'array',
        'stats' => 'array',
        'team_members' => 'array',
        'innovations' => 'array',
        'innovation_stats' => 'array',
    ];

    /**
     * Get the about page settings or return default values
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
     * Get default about page values
     */
    public static function getDefaults()
    {
        return [
            // Hero Section
            'hero_badge' => 'Est. 2010 - Crafting Excellence',
            'hero_title_line1' => 'About',
            'hero_title_line2' => 'AudioGold',
            'hero_subtitle' => 'Pioneering the future of audio excellence with innovative amplifier technology and unwavering commitment to sound perfection.',

            // Story Section
            'story_title' => 'Our Story',
            'story_content' => "Founded in 2010 by a team of passionate audio engineers and music enthusiasts, AudioGold was born from a simple yet powerful vision: to create amplifiers that deliver uncompromising sound quality without the premium price tag.\n\nWhat started in a small workshop in California has grown into a global brand trusted by audiophiles, musicians, and recording studios worldwide. Our journey has been driven by innovation, quality, and an unwavering commitment to excellence.",
            'mission_title' => 'Our Mission',
            'mission_content' => "To democratize premium audio experiences by engineering world-class amplifiers that combine cutting-edge technology with accessible pricing.\n\nWe believe everyone deserves to experience music the way it was meant to be heard – with clarity, depth, and emotion. Our mission extends beyond products; we're building a community of audio enthusiasts who share our passion for sonic perfection.",

            // Values Section
            'values_title' => 'Our Core Values',
            'values_subtitle' => 'The principles that guide everything we do',
            'values' => [
                [
                    'title' => 'Quality First',
                    'description' => 'We never compromise on quality. Every component is carefully selected and rigorously tested to ensure peak performance and longevity.',
                    'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                    'gradient' => 'bg-gradient-to-br from-green-500 to-emerald-600'
                ],
                [
                    'title' => 'Innovation',
                    'description' => 'Continuous research and development drive us forward. We embrace new technologies while respecting timeless audio principles.',
                    'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                    'gradient' => 'bg-gradient-to-br from-yellow-500 to-orange-600'
                ],
                [
                    'title' => 'Customer Focus',
                    'description' => 'Your satisfaction is our priority. We provide exceptional support, comprehensive warranties, and products designed with your needs in mind.',
                    'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
                    'gradient' => 'bg-gradient-to-br from-red-500 to-rose-600'
                ],
                [
                    'title' => 'Sustainability',
                    'description' => 'We are committed to environmental responsibility through eco-friendly manufacturing processes and recyclable materials.',
                    'icon' => 'M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                    'gradient' => 'bg-gradient-to-br from-teal-500 to-cyan-600'
                ],
                [
                    'title' => 'Transparency',
                    'description' => 'Honest communication, clear pricing, and authentic reviews. We build trust through openness and integrity in everything we do.',
                    'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z',
                    'gradient' => 'bg-gradient-to-br from-indigo-500 to-purple-600'
                ],
                [
                    'title' => 'Community',
                    'description' => 'Building a global community of audio enthusiasts who share knowledge, experiences, and passion for exceptional sound.',
                    'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                    'gradient' => 'bg-gradient-to-br from-pink-500 to-rose-600'
                ]
            ],

            // Stats Section
            'stats' => [
                ['value' => '15+', 'label' => 'Years Experience'],
                ['value' => '50K+', 'label' => 'Happy Customers'],
                ['value' => '100+', 'label' => 'Countries Served'],
                ['value' => '98%', 'label' => 'Satisfaction Rate']
            ],

            // Team Section
            'team_title' => 'Meet Our Team',
            'team_subtitle' => 'The passionate people behind AudioGold',
            'team_members' => [
                [
                    'name' => 'Michael Chen',
                    'role' => 'Founder & CEO',
                    'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop&q=80',
                    'bio' => 'Audio engineer with 20+ years of experience in amplifier design and a passion for sonic perfection.'
                ],
                [
                    'name' => 'Sarah Rodriguez',
                    'role' => 'Chief Technology Officer',
                    'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop&q=80',
                    'bio' => 'Former NASA engineer bringing aerospace-grade precision to audio amplification technology.'
                ],
                [
                    'name' => 'David Thompson',
                    'role' => 'Head of Customer Experience',
                    'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop&q=80',
                    'bio' => 'Dedicated to ensuring every customer receives world-class support and satisfaction.'
                ]
            ],

            // Innovation Section
            'innovation_title' => 'Innovation at Our Core',
            'innovation_content' => 'Our state-of-the-art research and development facility houses the latest in audio testing equipment and simulation technology. We invest heavily in R&D to ensure every product we release pushes the boundaries of what\'s possible in audio amplification.',
            'innovations' => [
                'Proprietary Class-D amplification technology',
                'Advanced thermal management systems',
                'Digital signal processing optimization',
                'Eco-friendly power efficiency designs',
                'Modular architecture for easy upgrades'
            ],
            'innovation_stats' => [
                ['value' => '50+', 'label' => 'Patents Filed', 'gradient' => 'from-blue-500 to-cyan-600'],
                ['value' => '24/7', 'label' => 'Testing Lab', 'gradient' => 'from-purple-500 to-pink-600'],
                ['value' => '100%', 'label' => 'Quality Tested', 'gradient' => 'from-green-500 to-emerald-600'],
                ['value' => 'R&D', 'label' => 'Excellence', 'gradient' => 'from-orange-500 to-amber-600']
            ],

            // CTA Section
            'cta_title' => 'Join the AudioGold Family',
            'cta_subtitle' => 'Experience the difference that passion, innovation, and quality craftsmanship can make in your audio journey.',
            'cta_primary_text' => 'Explore Products',
            'cta_primary_link' => '/products',
            'cta_secondary_text' => 'Contact Us',
            'cta_secondary_link' => '/contact',
        ];
    }
}
