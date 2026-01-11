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
        // Create parent categories
        $boosterAmplifiers = Category::create([
            'name' => 'Booster Amplifiers',
            'slug' => 'booster-amplifiers',
            'description' => 'High-gain amplification for weak signals',
            'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop',
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
            'parent_id' => null,
            'product_count' => 0,
            'order' => 3,
            'is_active' => true,
        ]);

        // Create child categories (subcategories of Power Amplifiers)
        Category::create([
            'name' => 'Class AB Amplifiers',
            'slug' => 'class-ab',
            'description' => 'Class AB amplifiers offer high fidelity but low efficiency',
            'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop',
            'parent_id' => $powerAmplifiers->id,
            'product_count' => 45,
            'order' => 1,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Class H Amplifiers',
            'slug' => 'class-h',
            'description' => 'Improve efficiency using dynamic power supply adjustment',
            'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=600&h=400&fit=crop',
            'parent_id' => $powerAmplifiers->id,
            'product_count' => 6,
            'order' => 2,
            'is_active' => true,
        ]);
    }
}
