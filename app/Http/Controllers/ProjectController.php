<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

use App\Services\ProjectService;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index(Request $request)
    {
        $filters = [
            'category' => $request->query('cat'),
        ];

        $categories = Category::where('status', 1)->where('parent_id', 0)->latest()->get();

        $projects = $this->projectService->getFilteredProjects($filters);

        return view('pages.projects.list', compact('categories', 'projects'));
    }

    public function getProjectsByCategory(Request $request)
    {
        $category = $request->query->get('cat');
        if(session('locale', config('app.locale')) == 'en') {
            $categoryId = Category::where('name', $category)->firstOrFail()->id;
        } else {
            $categoryId = Category::where('arabic_name', $category)->firstOrFail()->id;
        }

        $projects = Project::where('category_id', $categoryId)
            ->where('status', 1)
            ->with('images')->with('category')
            ->get();

        return response()->json(['projects' => $projects]);
    }

    public function show($slug)
    {
        try {
            $project = Project::where('slug', $slug)->firstOrFail();

            // 1. Get similar projects from the same category
            $similarProjects = $project->category->projects->where('id', '!=', $project->id)->take(6);

            // 2. If none, get from parent category
            if ($similarProjects->isEmpty() && $project->category->parentCategory) {
                $similarProjects = $project->category->parentCategory?->projects->where('id', '!=', $project->id)->take(6);
            }

            // 3. If still none, get from child categories
            if ($similarProjects->isEmpty() && $project->category->subCategories->count()) {
                $childProjects = collect();
                foreach ($project->category->subCategories as $subCategory) {
                    $childProjects = $childProjects->merge($subCategory->projects->where('id', '!=', $project->id));
                }
                $similarProjects = $childProjects->take(6);
            }

            return view('pages.projects.show', compact('project', 'similarProjects'));
        } catch (\Exception $e) {
            return redirect()->route('projects')->with('error', 'Project not found');
        }
    }
}
