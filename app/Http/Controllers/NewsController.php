<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of news
     */
    public function index(): View
    {
        $news = News::published()->latest()->paginate(9);

        return view('news.index', compact('news'));
    }

    /**
     * Display the specified news article
     */
    public function show(string $slug): View
    {
        $newsItem = News::where('slug', $slug)->where('is_published', true)->firstOrFail();
        
        // Increment views
        $newsItem->incrementViews();

        // Get related news
        $relatedNews = News::published()
            ->where('id', '!=', $newsItem->id)
            ->latest()
            ->take(3)
            ->get();

        return view('news.show', compact('newsItem', 'relatedNews'));
    }
}
