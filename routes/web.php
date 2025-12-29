<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home/Index');
})->name('home');

Route::get('/products', function () {
    return Inertia::render('Products/Index');
})->name('products');

Route::get('/products/booster-amplifiers', function () {
    return Inertia::render('Products/Category', [
        'category' => 'booster-amplifiers'
    ]);
})->name('products.booster');

Route::get('/products/mixer-amplifiers', function () {
    return Inertia::render('Products/Category', [
        'category' => 'mixer-amplifiers'
    ]);
})->name('products.mixer');

Route::get('/products/power-amplifiers', function () {
    return Inertia::render('Products/PowerAmplifiers');
})->name('products.power');

Route::get('/products/power-amplifiers/class-ab', function () {
    return Inertia::render('Products/Category', [
        'category' => 'class-ab'
    ]);
})->name('products.power.class-ab');

Route::get('/products/power-amplifiers/class-h', function () {
    return Inertia::render('Products/Category', [
        'category' => 'class-h'
    ]);
})->name('products.power.class-h');

// Product Detail Route
Route::get('/products/{category}/{slug}', function ($category, $slug) {
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
            'category' => $category,
            'categoryName' => $categoryNames[$category] ?? 'Audio Equipment',
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

    // Sample product data - will be replaced with database queries later
    $products = [
        'booster-amplifiers' => [
            'ag-ba-500' => [
                'name' => 'AG-BA-500 Booster Amplifier',
                'slug' => 'ag-ba-500',
                'category' => 'booster-amplifiers',
                'categoryName' => 'Booster Amplifiers',
                'description' => 'Professional-grade booster amplifier with superior sound quality and reliability. Perfect for commercial installations, public address systems, and large venue applications.',
                'images' => [
                    'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1614113489855-66422d8ca22a?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1519558260268-cde7e03a0152?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1487180144351-b8472da7d491?w=800&h=800&fit=crop',
                ],
                'features' => [
                    'High-quality audio amplification with minimal distortion',
                    'Built-in protection circuits for overload and short circuit',
                    'Multiple input options including MIC, AUX, and USB',
                    'Energy-efficient design with low power consumption',
                    'Durable construction for long-lasting performance',
                    'Easy installation and user-friendly controls'
                ],
                'specifications' => [
                    ['label' => 'Output Power', 'value' => '500W RMS'],
                    ['label' => 'Frequency Response', 'value' => '20Hz - 20kHz'],
                    ['label' => 'Input Sensitivity', 'value' => '775mV'],
                    ['label' => 'Signal to Noise Ratio', 'value' => '>90dB'],
                    ['label' => 'Total Harmonic Distortion', 'value' => '<0.5%'],
                    ['label' => 'Input Impedance', 'value' => '10kΩ'],
                    ['label' => 'Output Impedance', 'value' => '4-16Ω'],
                    ['label' => 'Power Supply', 'value' => 'AC 220V ±10%, 50Hz'],
                    ['label' => 'Dimensions', 'value' => '483 x 440 x 88mm'],
                    ['label' => 'Weight', 'value' => '12.5 kg'],
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
                        'answer' => 'This amplifier supports speakers with impedance ranging from 4Ω to 16Ω. We recommend using high-quality speakers with power handling capacity of at least 500W for optimal performance.'
                    ],
                    [
                        'question' => 'Is installation service available?',
                        'answer' => 'Yes, we provide professional installation services across India. Our expert technicians can help with system design, installation, and configuration. Contact us for a customized quote.'
                    ],
                ]
            ],
        ],
        'mixer-amplifiers' => [
            'ag-ma-1000' => [
                'name' => 'AG-MA-1000 Mixer Amplifier',
                'slug' => 'ag-ma-1000',
                'category' => 'mixer-amplifiers',
                'categoryName' => 'Mixer Amplifiers',
                'description' => 'Professional 6-channel mixer amplifier with advanced features for versatile audio applications. Ideal for conference rooms, auditoriums, and commercial spaces.',
                'images' => [
                    'https://images.unsplash.com/photo-1593784991095-a205069470b6?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1511379938547-c1f69419868d?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1598653222000-6b7b7a552625?w=800&h=800&fit=crop',
                    'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?w=800&h=800&fit=crop',
                ],
                'features' => [
                    '6 independent input channels with individual volume control',
                    'Built-in 3-band EQ for precise sound shaping',
                    'Priority MIC function for announcements',
                    'USB/SD card player with MP3 support',
                    'Bluetooth connectivity for wireless audio streaming',
                    'Phantom power for condenser microphones'
                ],
                'specifications' => [
                    ['label' => 'Output Power', 'value' => '1000W RMS'],
                    ['label' => 'Frequency Response', 'value' => '20Hz - 20kHz'],
                    ['label' => 'Number of Channels', 'value' => '6 MIC + 2 AUX'],
                    ['label' => 'Signal to Noise Ratio', 'value' => '>95dB'],
                    ['label' => 'Total Harmonic Distortion', 'value' => '<0.3%'],
                    ['label' => 'Input Sensitivity', 'value' => 'MIC: 5mV, LINE: 775mV'],
                    ['label' => 'Phantom Power', 'value' => '+48V DC'],
                    ['label' => 'Power Supply', 'value' => 'AC 220V ±10%, 50Hz'],
                    ['label' => 'Dimensions', 'value' => '483 x 440 x 132mm'],
                    ['label' => 'Weight', 'value' => '18.5 kg'],
                ],
                'faqs' => [
                    [
                        'question' => 'Can I connect multiple microphones simultaneously?',
                        'answer' => 'Yes, this mixer amplifier features 6 independent microphone inputs, allowing you to connect and control multiple microphones at the same time. Each channel has its own volume control for precise mixing.'
                    ],
                    [
                        'question' => 'Does it support zone control?',
                        'answer' => 'This model features multiple zone outputs, allowing you to distribute audio to different areas with independent volume control. Perfect for multi-room installations.'
                    ],
                    [
                        'question' => 'Is it compatible with wireless microphones?',
                        'answer' => 'Absolutely! You can connect wireless microphone receivers to any of the MIC inputs. The amplifier also provides phantom power for condenser microphones when needed.'
                    ],
                ]
            ],
        ],
    ];

    // Get the product data
    $categoryProducts = $products[$category] ?? [];
    $product = $categoryProducts[$slug] ?? null;

    // If product doesn't have specific data, generate default data
    if (!$product) {
        // Validate category exists
        $validCategories = ['booster-amplifiers', 'mixer-amplifiers', 'class-ab', 'class-h'];
        if (!in_array($category, $validCategories)) {
            abort(404);
        }

        $product = $generateDefaultProduct($slug, $category);
    }

    return Inertia::render('Products/Detail', [
        'product' => $product
    ]);
})->name('products.detail');

Route::get('/contact', function () {
    return Inertia::render('Contact/Index');
})->name('contact');

Route::get('/support', function () {
    return Inertia::render('Support/Index');
})->name('support');

Route::get('/faq', function () {
    return Inertia::render('Faq/Index');
})->name('faq');

Route::get('/about', function () {
    return Inertia::render('About/Index');
})->name('about');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
