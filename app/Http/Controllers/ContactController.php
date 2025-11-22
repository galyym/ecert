<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * Display the contact page
     */
    public function index(): View
    {
        return view('contact');
    }
}
