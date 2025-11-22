<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::published();
        
        // Фильтр по категории
        if ($request->has('category') && $request->category) {
            $query->where('category', $request->category);
        }
        
        // Фильтр по статусу
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
        
        $projects = $query->orderBy('project_date', 'desc')
            ->paginate(9);
            
        // Получаем уникальные категории для фильтра
        $categories = Project::published()
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->sort();
            
        return view('pages.projects.index', compact('projects', 'categories'));
    }
    
    public function show($slug)
    {
        $project = Project::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
            
        // Получаем связанные проекты
        $relatedProjects = Project::published()
            ->where('id', '!=', $project->id)
            ->where('category', $project->category)
            ->take(3)
            ->get();
            
        return view('pages.projects.show', compact('project', 'relatedProjects'));
    }
}
