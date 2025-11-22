<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\News;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the homepage
     */
    public function index(): View
    {
        $services = Service::active()->ordered()->take(6)->get();
        $projects = Project::active()->featured()->latest()->take(3)->get();
        $news = News::published()->latest()->take(3)->get();

        return view('home', compact('services', 'projects', 'news'));
    }
}
