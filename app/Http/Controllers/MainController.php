<?php

namespace App\Http\Controllers;

use App\MoonShine\Pages\MainPage;
use Illuminate\Http\Request;

class MainController extends Controller
{
//    public function __invoke(MainPage $page): MainPage
//    {
//        return $page->loaded();
//    }

    public function index(MainPage $page): MainPage
    {
        return $page->loaded();
    }
}
