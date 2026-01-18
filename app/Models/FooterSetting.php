<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'newsletter_title',
        'newsletter_subtitle',
        'company_description',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'youtube_url',
        'useful_links',
        'contact_email',
        'contact_phone',
        'contact_address',
        'copyright_text',
    ];

    protected $casts = [
        'useful_links' => 'array',
    ];

    /**
     * Get the footer settings or return default values
     */
    public static function getSettings()
    {
        $settings = self::first();

        if (!$settings) {
            return self::getDefaults();
        }

        // Return as array for consistent frontend access
        return $settings->toArray();
    }

    /**
     * Get default footer values
     */
    public static function getDefaults()
    {
        return [
            'newsletter_title' => 'Subscribe Now',
            'newsletter_subtitle' => "Don't miss our future updates! Get Subscribed Today!",
            'company_description' => 'Making premium audio technology accessible to all. Professional-grade equipment for the Indian market.',
            'facebook_url' => '#',
            'twitter_url' => '#',
            'instagram_url' => '#',
            'youtube_url' => '#',
            'useful_links' => [
                ['label' => 'Home', 'url' => '/'],
                ['label' => 'Products', 'url' => '#products'],
                ['label' => 'About us', 'url' => '#about'],
                ['label' => "FAQ's", 'url' => '#faq'],
                ['label' => 'Support', 'url' => '#support'],
                ['label' => 'Contact', 'url' => '#contact'],
            ],
            'contact_email' => 'shivamelectronics7@gmail.com',
            'contact_phone' => '+91 7011651721',
            'contact_address' => 'A-64 Roop nagar industrial area, Loni Ghaziabad',
            'copyright_text' => '©2025. AudioGold.in All Rights Reserved.',
        ];
    }
}
