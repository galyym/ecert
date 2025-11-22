<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects
     */
    public function index(Request $request): View
    {
        $query = Project::active()->latest('completion_date');

        // Filter by category if provided
        if ($request->has('category') && $request->category) {
            $query->category($request->category);
        }

        $projects = $query->get();
        $categories = Project::active()->distinct()->pluck('category')->filter();

        return view('projects.index', compact('projects', 'categories'));
    }

    /**
     * Display the specified project
     */
    public function show(string $slug): View
    {
        $project = Project::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('projects.show', compact('project'));
    }
}
