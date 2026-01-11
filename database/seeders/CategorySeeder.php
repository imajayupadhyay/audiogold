<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate existing categories
        Category::truncate();

        // Create parent categories
        $boosterAmplifiers = Category::create([
            'name' => 'Booster Amplifiers',
            'slug' => 'booster-amplifiers',
            'description' => 'High-gain amplification for weak signals',
            'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop',
            'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
            'features' => [
                'Ultra-low noise floor',
                'Wide frequency response',
                'Adjustable gain control',
                'Signal integrity preservation',
                'Compact form factor'
            ],
            'parent_id' => null,
            'product_count' => 15,
            'order' => 1,
            'is_active' => true,
        ]);

        $mixerAmplifiers = Category::create([
            'name' => 'Mixer Amplifiers',
            'slug' => 'mixer-amplifiers',
            'description' => 'Combine audio sources and output together',
            'image' => 'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=600&h=400&fit=crop',
            'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4',
            'features' => [
                'Multiple input channels',
                'Independent volume controls',
                'Built-in EQ per channel',
                'Zone control capability',
                'Professional mixing console'
            ],
            'parent_id' => null,
            'product_count' => 11,
            'order' => 2,
            'is_active' => true,
        ]);

        $powerAmplifiers = Category::create([
            'name' => 'Power Amplifiers',
            'slug' => 'power-amplifiers',
            'description' => 'Deliver strong output to speakers efficiently',
            'image' => 'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=600&h=400&fit=crop',
            'icon' => 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z',
            'features' => [
                'High wattage output',
                'Exceptional efficiency',
                'Advanced thermal management',
                'Bridge-mono capability',
                'Professional-grade components'
            ],
            'parent_id' => null,
            'product_count' => 0,
            'order' => 3,
            'is_active' => true,
        ]);

        // Create child categories (subcategories of Power Amplifiers)
        Category::create([
            'name' => 'Class AB',
            'slug' => 'class-ab',
            'description' => 'Class AB amplifiers offer high fidelity but low efficiency',
            'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop',
            'icon' => 'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z',
            'features' => [
                'High fidelity audio reproduction',
                'Professional-grade performance',
                'Balanced sound and efficiency',
                'Minimal crossover distortion',
                'Reliable and proven technology'
            ],
            'parent_id' => $powerAmplifiers->id,
            'product_count' => 45,
            'order' => 1,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Class H',
            'slug' => 'class-h',
            'description' => 'Improve efficiency using dynamic power supply adjustment',
            'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop',
            'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
            'features' => [
                'Superior efficiency',
                'Dynamic power supply rails',
                'Reduced heat generation',
                'Lower power consumption',
                'Advanced power management'
            ],
            'parent_id' => $powerAmplifiers->id,
            'product_count' => 6,
            'order' => 2,
            'is_active' => true,
        ]);
    }
}
