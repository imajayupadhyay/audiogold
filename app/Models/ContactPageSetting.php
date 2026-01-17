<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'badge_text',
        'title_line1',
        'title_line2',
        'subtitle',
        'email',
        'phone',
        'whatsapp',
        'timing_days',
        'timing_hours',
        'address',
    ];

    /**
     * Get the contact page settings or return default values
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
     * Get default contact page values
     */
    public static function getDefaults()
    {
        return [
            'badge_text' => 'Get In Touch',
            'title_line1' => 'Have a Question?',
            'title_line2' => "We're Here to Help",
            'subtitle' => "Fill out the form below, and we'll get back to you within 24 hours",
            'email' => 'shivamelectronics7@gmail.com',
            'phone' => '+91 7011651721',
            'whatsapp' => '+91 7011651721',
            'timing_days' => 'Monday to Saturday',
            'timing_hours' => '9:00 AM – 6:00 PM',
            'address' => 'A-64 Roop nagar industrial area, Loni Ghaziabad',
        ];
    }
}
