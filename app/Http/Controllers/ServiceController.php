<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of services
     */
    public function index(): View
    {
        $services = Service::active()->ordered()->get();

        return view('services.index', compact('services'));
    }

    /**
     * Display the specified service
     */
    public function show(string $slug): View
    {
        $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('services.show', compact('service'));
    }
}
