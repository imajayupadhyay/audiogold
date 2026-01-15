<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides = [
            [
                'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=1920&h=1080&fit=crop&q=80',
                'badge' => 'Premium Audio Equipment',
                'title' => 'Experience',
                'subtitle' => 'Crystal Clear Sound',
                'description' => 'Making premium professional audio technology accessible to everyone across India.',
                'features' => [
                    'Professional-grade amplifiers',
                    'Affordable premium quality',
                    'Expert support & service'
                ],
                'button_text' => 'Explore Products',
                'button_link' => '/products',
                'secondary_button_text' => 'Get in Touch',
                'secondary_button_link' => '#contact',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=1920&h=1080&fit=crop&q=80',
                'badge' => 'Industry Leading',
                'title' => 'Power Your',
                'subtitle' => 'Sound System',
                'description' => 'Advanced audio amplification solutions designed for commercial and professional applications.',
                'features' => [
                    'High-power output capability',
                    'Advanced thermal management',
                    'Rack-mountable design'
                ],
                'button_text' => 'Explore Products',
                'button_link' => '/products',
                'secondary_button_text' => 'Get in Touch',
                'secondary_button_link' => '#contact',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=1920&h=1080&fit=crop&q=80',
                'badge' => 'Trusted by Professionals',
                'title' => 'Elevate Your',
                'subtitle' => 'Audio Experience',
                'description' => 'Join 1000+ satisfied customers who trust AudioGold for their audio needs.',
                'features' => [
                    '2-year comprehensive warranty',
                    '24/7 technical support',
                    'Pan-India service network'
                ],
                'button_text' => 'Explore Products',
                'button_link' => '/products',
                'secondary_button_text' => 'Get in Touch',
                'secondary_button_link' => '#contact',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::create($slide);
        }
    }
}
