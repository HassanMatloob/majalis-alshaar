<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agency;
use App\Models\Category;
use App\Models\Property;
use App\Enums\AgencyStatus;
use Illuminate\Http\Request;
use App\Enums\PropertyStatus;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index() {
        $activeCategories = Category::where('status', 1)->where('parent_id', 0)->count();
        $activeSubCategories = Category::where('status', 1)->where('parent_id','!=', 0)->count();
        $activeProjects = Project::where('status', 1)->count();
        $messages = Message::count();

        $featuredProjects = Project::where('is_featured', 1)->where('status', 1)
            ->with('images')->with('category')->orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard.index' , compact('activeCategories', 'activeSubCategories', 'activeProjects', 'messages', 'featuredProjects'));
    }
}
