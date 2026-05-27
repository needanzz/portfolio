<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectApiController extends Controller
{
    /**
     * Get a list of filtered and searched projects in JSON format.
     */
    public function index(Request $request)
    {
        $query = Project::query();

        // 1. Filter by category
        if ($request->has('category') && $request->category !== '' && strtolower($request->category) !== 'all') {
            $query->where('category', $request->category);
        }

        // 2. Filter by search query (across titles and descriptions in both ID and EN versions)
        if ($request->has('search') && $request->search !== '') {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title_id', 'like', $searchTerm)
                  ->orWhere('title_en', 'like', $searchTerm)
                  ->orWhere('description_id', 'like', $searchTerm)
                  ->orWhere('description_en', 'like', $searchTerm);
            });
        }

        // 3. Order by display weight ('order'), then by creation date
        $projects = $query->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->take(24)
            ->get();

        return response()->json([
            'success' => true,
            'data' => $projects,
        ]);
    }
}
