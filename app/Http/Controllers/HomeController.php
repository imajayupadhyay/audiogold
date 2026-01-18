<?php

namespace App\Http\Controllers;

use App\Models\HeroSlide;
use App\Models\HomepageSetting;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        $heroSlides = HeroSlide::active()
            ->ordered()
            ->get()
            ->map(function ($slide) {
                return [
                    'id' => $slide->id,
                    'image' => $slide->image,
                    'badge' => $slide->badge,
                    'title' => $slide->title,
                    'subtitle' => $slide->subtitle,
                    'description' => $slide->description,
                    'features' => $slide->features ?? [],
                    'button_text' => $slide->button_text,
                    'button_link' => $slide->button_link,
                    'secondary_button_text' => $slide->secondary_button_text,
                    'secondary_button_link' => $slide->secondary_button_link,
                ];
            });

        $homepageSettings = HomepageSetting::getSettings();

        return Inertia::render('Home/Index', [
            'heroSlides' => $heroSlides,
            'homepageSettings' => $homepageSettings,
        ]);
    }
}
