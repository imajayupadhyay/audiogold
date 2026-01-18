<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqPageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        // Hero Section
        'hero_badge',
        'hero_title_line1',
        'hero_title_line2',
        'hero_subtitle',

        // FAQ Categories and Items
        'categories',
        'faqs',

        // Quick Actions Section
        'quick_actions',

        // CTA Section
        'cta_title',
        'cta_subtitle',
        'cta_primary_text',
        'cta_primary_link',
        'cta_secondary_text',
        'cta_secondary_link',
    ];

    protected $casts = [
        'categories' => 'array',
        'faqs' => 'array',
        'quick_actions' => 'array',
    ];

    /**
     * Get the FAQ page settings or return default values
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
     * Get default FAQ page values
     */
    public static function getDefaults()
    {
        return [
            // Hero Section
            'hero_badge' => 'Help Center',
            'hero_title_line1' => 'Frequently Asked',
            'hero_title_line2' => 'Questions',
            'hero_subtitle' => 'Find answers to the most common questions about Audio Gold products and services',

            // FAQ Categories
            'categories' => [
                ['id' => 'about', 'name' => 'About Audio Gold'],
                ['id' => 'products', 'name' => 'Product Information'],
                ['id' => 'purchasing', 'name' => 'Purchasing & Orders'],
                ['id' => 'dealer', 'name' => 'Dealer & Partnership'],
                ['id' => 'support', 'name' => 'Support & Service'],
                ['id' => 'returns', 'name' => 'Returns & Warranty'],
            ],

            // FAQs by Category
            'faqs' => [
                'about' => [
                    [
                        'question' => 'What does Audio Gold specialize in?',
                        'answer' => 'Audio Gold specializes in designing and manufacturing professional audio products tailored to meet the needs of the Indian market at affordable prices.'
                    ],
                    [
                        'question' => 'Are products available for individual customers or businesses?',
                        'answer' => 'Audio Gold products are available for both individual customers and businesses, including event organizers, audio professionals, and retailers.'
                    ],
                    [
                        'question' => 'What makes Audio Gold different from other brands?',
                        'answer' => 'Audio Gold combines global expertise with local market insights to deliver innovative, high-quality, and affordable products specifically designed for Indian audiences.'
                    ],
                    [
                        'question' => 'Where is Audio Gold located?',
                        'answer' => 'Our headquarters are in A-64 Roop Nagar Industrial Area Loni Ghaziabad Uttar Pradesh Pin Code: 201102'
                    ]
                ],
                'products' => [
                    [
                        'question' => 'Are your products suitable for large-scale events?',
                        'answer' => 'Yes, our products are designed to cater to all types of events, from intimate gatherings to large-scale concerts and performances.'
                    ],
                    [
                        'question' => 'What types of products do you offer?',
                        'answer' => 'We offer a wide range of professional audio amplifiers designed for various applications and venue sizes.'
                    ],
                    [
                        'question' => 'Do your products come with a warranty?',
                        'answer' => 'Yes, all Audio Gold products come with a standard warranty. Please refer to the product manual or contact our support team for details.'
                    ],
                    [
                        'question' => 'Where can I find the user manuals for Audio Gold products?',
                        'answer' => 'User manuals are provided with the products. You can also download them from our website under the "Support" section.'
                    ]
                ],
                'purchasing' => [
                    [
                        'question' => 'How can I purchase Audio Gold products?',
                        'answer' => 'You can purchase our products through authorized dealers, distributors, or by contacting us directly via our website.'
                    ],
                    [
                        'question' => 'Can I order products online?',
                        'answer' => 'Yes, you can place orders online. Contact us or visit our website for more details.'
                    ],
                    [
                        'question' => 'Do you offer discounts for bulk purchases?',
                        'answer' => 'Yes, discounts are available for bulk purchases. Contact our sales team for a custom quote.'
                    ],
                    [
                        'question' => 'Do you ship products across India?',
                        'answer' => 'Yes, we ship our products nationwide. Shipping charges and delivery times depend on the location.'
                    ]
                ],
                'dealer' => [
                    [
                        'question' => 'How can I become an Audio Gold dealer?',
                        'answer' => 'Visit our Become a Dealer page to learn about our dealership program and fill out the application form.'
                    ],
                    [
                        'question' => 'What are the benefits of becoming an Audio Gold dealer?',
                        'answer' => 'Dealers gain access to exclusive pricing, marketing support, and priority customer service.'
                    ]
                ],
                'support' => [
                    [
                        'question' => 'Do you provide technical support for your products?',
                        'answer' => 'Yes, our technical support team is available to assist with installation, troubleshooting, and product maintenance.'
                    ],
                    [
                        'question' => 'Do you offer repair services?',
                        'answer' => 'Yes, we offer repair services for all Audio Gold products. Contact us for details on service centers near you.'
                    ],
                    [
                        'question' => 'What should I do if my product is not working properly?',
                        'answer' => "Please contact our support team with the product details and a description of the issue. We'll guide you through the next steps."
                    ],
                    [
                        'question' => 'How can I contact customer support?',
                        'answer' => 'You can reach our support team via phone, email, or the contact form on our website.'
                    ]
                ],
                'returns' => [
                    [
                        'question' => 'What is your return policy?',
                        'answer' => 'Products can be returned within 1 week if they are unused and in their original packaging. Visit our Returns Policy page for more details.'
                    ],
                    [
                        'question' => 'Are repairs covered under warranty?',
                        'answer' => 'Repairs are covered under warranty if the issue is due to manufacturing defects. Terms and conditions apply.'
                    ],
                    [
                        'question' => 'How do I claim a warranty?',
                        'answer' => 'To claim a warranty, contact our support team with your proof of purchase and product details.'
                    ]
                ]
            ],

            // Quick Actions
            'quick_actions' => [
                [
                    'title' => 'Need More Help?',
                    'description' => 'Visit our support center for additional assistance',
                    'link_text' => 'Get Support',
                    'link' => '/support',
                    'gradient' => 'from-purple-500 to-pink-600',
                    'icon' => 'headset'
                ],
                [
                    'title' => 'Contact Us',
                    'description' => 'Have a specific question? Reach out to our team',
                    'link_text' => 'Send Message',
                    'link' => '/contact',
                    'gradient' => 'from-blue-500 to-cyan-600',
                    'icon' => 'email'
                ],
                [
                    'title' => 'Call Us',
                    'description' => 'Speak directly with our support team',
                    'link_text' => '+91 7011651721',
                    'link' => 'tel:+917011651721',
                    'gradient' => 'from-green-500 to-emerald-600',
                    'icon' => 'phone'
                ]
            ],

            // CTA Section
            'cta_title' => 'Get in Touch With Audio Gold',
            'cta_subtitle' => "Can't find the answer you're looking for? Our friendly team is here to help.",
            'cta_primary_text' => 'Contact Support',
            'cta_primary_link' => '/contact',
            'cta_secondary_text' => 'WhatsApp Us',
            'cta_secondary_link' => 'https://wa.me/917011651721',
        ];
    }
}
