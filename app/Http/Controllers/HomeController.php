<?php

namespace App\Http\Controllers;
use App\Models\Agent;
use App\Models\Category;
use App\Models\Property;

use App\Enums\AgencyStatus;
use Illuminate\Http\Request;
use App\Enums\PropertyStatus;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('is_featured', 1)
            ->where('status', 1)
            ->get();

        $categories = Category::where('status', 1)->get();

        return view('pages.home', compact('featuredProjects', 'categories'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function languageSwitcher($lang)
    {
        session()->put('locale', $lang);
        return 1;
    }
}
