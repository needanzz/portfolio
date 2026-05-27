<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\Experience;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display the profile page.
     */
    public function index()
    {
        // 1. Fetch site settings in a single bulk query with clean fallbacks
        $settings = SiteSetting::pluck('value', 'key');

        $profile = [
            'full_name' => $settings->get('full_name', 'Muhammad Danil Aminuddin'),
            'tagline' => $settings->get('tagline', 'Full Stack Web Developer & Info System Architect'),
            'bio_id' => $settings->get('bio_id', 'Saya adalah seorang Full Stack Web Developer.'),
            'bio_en' => $settings->get('bio_en', 'I am a Full Stack Web Developer.'),
            'social_github' => $settings->get('social_github', 'https://github.com'),
            'social_linkedin' => $settings->get('social_linkedin', 'https://linkedin.com'),
            'social_instagram' => $settings->get('social_instagram', 'https://instagram.com'),
            'social_email' => $settings->get('social_email', 'danilaminuddin@example.com'),
        ];

        // 2. Fetch education experiences
        $education = Experience::education()
            ->orderBy('start_date', 'desc')
            ->get();

        return view('pages.profile', compact('profile', 'education'));
    }
}
