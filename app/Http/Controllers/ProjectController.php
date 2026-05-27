<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display the projects listing page.
     */
    public function index()
    {
        // Get all unique categories that actually have projects, to render the filter pills dynamically
        $categories = Project::select('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        // Get initial project list (sorted by order, then by creation date)
        $projects = Project::orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.projects.index', compact('categories', 'projects'));
    }

    /**
     * Display the specified project detail page.
     */
    public function show(Project $project)
    {
        return view('pages.projects.show', compact('project'));
    }
}
