<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display the experience & education timeline page.
     */
    public function index()
    {
        // Query professional work experiences (sorted descending by start date)
        $work = Experience::work()
            ->orderBy('start_date', 'desc')
            ->get();

        // Query educational milestones (sorted descending by start date)
        $education = Experience::education()
            ->orderBy('start_date', 'desc')
            ->get();

        return view('pages.experience', compact('work', 'education'));
    }
}
