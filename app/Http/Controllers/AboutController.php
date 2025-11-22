<?php

namespace App\Http\Controllers;

use App\Models\AboutSection;
use Illuminate\View\View;

class AboutController extends Controller
{
    /**
     * Display the about page
     */
    public function index(): View
    {
        $sections = AboutSection::active()->ordered()->get();

        return view('about', compact('sections'));
    }
}
