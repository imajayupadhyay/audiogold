<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get categories
        $boosterAmp = Category::where('slug', 'booster-amplifiers')->first();
        $mixerAmp = Category::where('slug', 'mixer-amplifiers')->first();
        $classAB = Category::where('slug', 'class-ab')->first();
        $classH = Category::where('slug', 'class-h')->first();

        // Sample products for Booster Amplifiers
        if ($boosterAmp) {
            Product::create([
                'name' => 'AGP-250 Professional Booster Amplifier',
                'slug' => 'agp-250-professional-booster-amplifier',
                'description' => 'High-performance 250W booster amplifier designed for professional audio applications. Features ultra-low noise floor and superior signal clarity for demanding installations.',
                'category_id' => $boosterAmp->id,
                'images' => [
                    'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=800&h=800&fit=crop',
                ],
                'features' => [
                    'Ultra-low noise floor (<-90dB)',
                    'Wide frequency response (20Hz - 20kHz)',
                    'Adjustable gain control with LED indicators',
                    'Signal integrity preservation technology',
                    'Compact 1U rack-mountable design',
                    'Built-in overload protection',
                ],
                'specifications' => [
                    ['label' => 'Model', 'value' => 'AGP-250'],
                    ['label' => 'Output Power', 'value' => '250W'],
                    ['label' => 'Frequency Response', 'value' => '20Hz - 20kHz (±1dB)'],
                    ['label' => 'Input Sensitivity', 'value' => '775mV'],
                    ['label' => 'Signal to Noise Ratio', 'value' => '>90dB'],
                    ['label' => 'Total Harmonic Distortion', 'value' => '<0.1%'],
                    ['label' => 'Input Impedance', 'value' => '10kΩ'],
                    ['label' => 'Output Impedance', 'value' => '4-16Ω'],
                    ['label' => 'Power Supply', 'value' => 'AC 220V ±10%, 50Hz'],
                    ['label' => 'Dimensions', 'value' => '19" x 1.75" x 12"'],
                    ['label' => 'Weight', 'value' => '4.5 kg'],
                    ['label' => 'Certification', 'value' => 'CE, RoHS Certified'],
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
                ],
                'order' => 1,
                'is_active' => true,
            ]);

            Product::create([
                'name' => 'AGP-500 High-Gain Booster',
                'slug' => 'agp-500-high-gain-booster',
                'description' => 'Premium 500W booster amplifier with advanced digital signal processing for exceptional audio quality in large venues and commercial spaces.',
                'category_id' => $boosterAmp->id,
                'images' => [
                    'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=800&h=800&fit=crop',
                ],
                'features' => [
                    'High-gain amplification with minimal distortion',
                    'Digital signal processing for enhanced clarity',
                    'Multiple input channels with individual controls',
                    'Energy-efficient Class D design',
                    'Advanced cooling system',
                    'Remote monitoring capability',
                ],
                'specifications' => [
                    ['label' => 'Model', 'value' => 'AGP-500'],
                    ['label' => 'Output Power', 'value' => '500W'],
                    ['label' => 'Frequency Response', 'value' => '10Hz - 22kHz (±1dB)'],
                    ['label' => 'Input Sensitivity', 'value' => '500mV'],
                    ['label' => 'Signal to Noise Ratio', 'value' => '>95dB'],
                    ['label' => 'Total Harmonic Distortion', 'value' => '<0.05%'],
                    ['label' => 'Power Supply', 'value' => 'AC 220V ±10%, 50Hz'],
                    ['label' => 'Dimensions', 'value' => '19" x 3.5" x 14"'],
                    ['label' => 'Certification', 'value' => 'CE, RoHS, FCC Certified'],
                ],
                'faqs' => [
                    [
                        'question' => 'Does this model support remote management?',
                        'answer' => 'Yes, the AGP-500 includes remote monitoring capability through our AudioGold Control app, allowing you to adjust settings and monitor performance remotely.'
                    ],
                    [
                        'question' => 'What is the power consumption?',
                        'answer' => 'The AGP-500 features energy-efficient Class D design with typical power consumption of 150W at idle and maximum 650W at full load.'
                    ],
                ],
                'order' => 2,
                'is_active' => true,
            ]);
        }

        // Sample products for Mixer Amplifiers
        if ($mixerAmp) {
            Product::create([
                'name' => 'AGM-4120 4-Zone Mixer Amplifier',
                'slug' => 'agm-4120-4-zone-mixer-amplifier',
                'description' => '120W mixer amplifier with 4 independent zones, perfect for multi-room audio distribution in commercial and residential installations.',
                'category_id' => $mixerAmp->id,
                'images' => [
                    'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=800&h=800&fit=crop',
                ],
                'features' => [
                    '4 independent zone outputs',
                    '6 input channels with individual EQ',
                    'Built-in MP3 player with USB/SD support',
                    'Priority override for emergency announcements',
                    'Individual volume control per zone',
                    '70V/100V constant voltage output option',
                ],
                'specifications' => [
                    ['label' => 'Model', 'value' => 'AGM-4120'],
                    ['label' => 'Total Output Power', 'value' => '120W'],
                    ['label' => 'Number of Zones', 'value' => '4 Independent Zones'],
                    ['label' => 'Input Channels', 'value' => '6 (4 Mic + 2 Line)'],
                    ['label' => 'Frequency Response', 'value' => '50Hz - 16kHz'],
                    ['label' => 'Signal to Noise Ratio', 'value' => '>85dB'],
                    ['label' => 'Output Options', 'value' => '4Ω, 8Ω, 70V, 100V'],
                    ['label' => 'Power Supply', 'value' => 'AC 220V, 50Hz'],
                ],
                'faqs' => [
                    [
                        'question' => 'Can I play different audio in each zone?',
                        'answer' => 'Yes, the AGM-4120 supports independent audio sources for each zone, allowing you to play different content in different areas simultaneously.'
                    ],
                    [
                        'question' => 'Is it suitable for restaurants?',
                        'answer' => 'Absolutely! This mixer amplifier is ideal for restaurants, cafes, and retail stores where you need to manage audio across multiple zones with different volume levels.'
                    ],
                ],
                'order' => 1,
                'is_active' => true,
            ]);
        }

        // Sample products for Class AB
        if ($classAB) {
            Product::create([
                'name' => 'AGP-2500AB Professional Class AB Amplifier',
                'slug' => 'agp-2500ab-professional-class-ab-amplifier',
                'description' => 'Premium 2500W Class AB power amplifier delivering exceptional sound quality with high fidelity and reliability for professional installations.',
                'category_id' => $classAB->id,
                'images' => [
                    'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=800&h=800&fit=crop',
                ],
                'features' => [
                    'True Class AB topology for superior sound quality',
                    'Massive transformer for stable power delivery',
                    'Dual channel operation with independent controls',
                    'Comprehensive protection circuits',
                    'Professional-grade components throughout',
                    'XLR and 1/4" balanced inputs',
                    'Speakon and binding post outputs',
                    'LED VU meters for output monitoring',
                ],
                'specifications' => [
                    ['label' => 'Model', 'value' => 'AGP-2500AB'],
                    ['label' => 'Output Power (8Ω)', 'value' => '2 x 800W'],
                    ['label' => 'Output Power (4Ω)', 'value' => '2 x 1250W'],
                    ['label' => 'Output Power (Bridge 8Ω)', 'value' => '2500W'],
                    ['label' => 'Frequency Response', 'value' => '20Hz - 20kHz (±0.5dB)'],
                    ['label' => 'Total Harmonic Distortion', 'value' => '<0.05% @ 1kHz'],
                    ['label' => 'Signal to Noise Ratio', 'value' => '>105dB'],
                    ['label' => 'Damping Factor', 'value' => '>500'],
                    ['label' => 'Input Impedance', 'value' => '20kΩ balanced'],
                    ['label' => 'Cooling', 'value' => 'Variable speed fan, front to rear'],
                    ['label' => 'Power Consumption', 'value' => '3500W max'],
                    ['label' => 'Dimensions', 'value' => '19" x 5.25" x 16"'],
                    ['label' => 'Weight', 'value' => '28 kg'],
                ],
                'faqs' => [
                    [
                        'question' => 'What makes Class AB amplifiers special?',
                        'answer' => 'Class AB amplifiers combine the best of Class A and Class B designs, offering high fidelity with excellent efficiency. They provide superior sound quality with low distortion, making them ideal for professional audio applications.'
                    ],
                    [
                        'question' => 'Can this run in bridge mode?',
                        'answer' => 'Yes, the AGP-2500AB can be configured in bridge mode to deliver 2500W into 8Ω for applications requiring maximum power output.'
                    ],
                    [
                        'question' => 'What protection features are included?',
                        'answer' => 'The amplifier includes DC protection, short circuit protection, thermal protection, and soft-start circuitry to ensure reliable operation and protect your speakers.'
                    ],
                ],
                'order' => 1,
                'is_active' => true,
            ]);
        }

        // Sample products for Class H
        if ($classH) {
            Product::create([
                'name' => 'AGP-3500H Class H Power Amplifier',
                'slug' => 'agp-3500h-class-h-power-amplifier',
                'description' => 'Advanced 3500W Class H amplifier with dynamic power supply adjustment for superior efficiency and performance in demanding applications.',
                'category_id' => $classH->id,
                'images' => [
                    'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=800&h=800&fit=crop',
                ],
                'features' => [
                    'Class H topology with dynamic voltage rail switching',
                    'Exceptional efficiency reducing power consumption',
                    'Reduced heat generation for cooler operation',
                    'Dual channel with independent signal processing',
                    'Advanced limiter with adjustable threshold',
                    'LCD display for real-time monitoring',
                    'Ethernet connectivity for network control',
                ],
                'specifications' => [
                    ['label' => 'Model', 'value' => 'AGP-3500H'],
                    ['label' => 'Output Power (8Ω)', 'value' => '2 x 1000W'],
                    ['label' => 'Output Power (4Ω)', 'value' => '2 x 1750W'],
                    ['label' => 'Output Power (Bridge 8Ω)', 'value' => '3500W'],
                    ['label' => 'Efficiency', 'value' => '>85%'],
                    ['label' => 'Frequency Response', 'value' => '20Hz - 20kHz (±0.3dB)'],
                    ['label' => 'Total Harmonic Distortion', 'value' => '<0.03% @ 1kHz'],
                    ['label' => 'Signal to Noise Ratio', 'value' => '>110dB'],
                    ['label' => 'Power Supply', 'value' => 'Switched-mode with PFC'],
                    ['label' => 'Dimensions', 'value' => '19" x 3.5" x 15"'],
                    ['label' => 'Weight', 'value' => '18 kg'],
                ],
                'faqs' => [
                    [
                        'question' => 'What are the benefits of Class H design?',
                        'answer' => 'Class H amplifiers use dynamic power supply voltage adjustment, providing excellent sound quality while significantly reducing power consumption and heat generation compared to traditional Class AB designs.'
                    ],
                    [
                        'question' => 'Does it support network control?',
                        'answer' => 'Yes, the AGP-3500H features Ethernet connectivity for integration with control systems and remote management through our web interface or mobile app.'
                    ],
                ],
                'order' => 1,
                'is_active' => true,
            ]);
        }
    }
}
