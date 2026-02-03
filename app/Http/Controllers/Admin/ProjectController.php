<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProjectImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index () {
        return view('admin.projects.list');
    }

    public function fetch (Request $request) {
        if($request->ajax()) {
            
            $projects = Project::where('status', 1)->latest()->get();

            $counter = 1;
            foreach ($projects as $project) {
                $project->counter = $counter++;
            }
            return DataTables::of($projects)
                // ->addColumn('check', function ($property) {
                //     return '<input type="checkbox" name="ids[]" value="' . $property->id . '" class="checkbox">';
                // })
                ->addColumn('counter', function ($project) {
                    return '<span class="pt-10 text-xs font-medium text-secondary">' . $project->counter ?? '-' . '</span>';
                })
                ->addColumn('image', function ($project) {
                    return '<img src="' . asset($project->images->first()?->path) . '" alt="Project Image" class="w-16 h-10 object-cover rounded-lg">';
                })
                ->addColumn('name', function ($project) {
                    return '<span class="pt-10 text-xs font-bold text-primary">' . $project->title . ' (' . $project->arabic_title . ')' .'</span>';
                })
                ->addColumn('promotion', function ($project) {
                    return '<span class="pt-10  text-sm text-black font-bold">' . $project->is_featured ? 'Featured' : 'Normal' . '</span>';
                })
                ->addColumn('date', function ($project) {
                    return '<span class="pt-10  text-sm text-black font-medium">' . date_format($project->created_at, 'd-m-Y') ?? '-' . '</span>';
                })
                ->addColumn('category', function ($project) {
                    return '<span class="pt-10  text-sm text-black font-medium">' . $project->category->name . ' (' . $project->category?->arabic_name . ')' . '</span>';
                })
                ->addColumn('status', function ($project) {
                    if($project->status == 1) {
                        return '<span class="inline-block px-7 py-1 text-xs text-green-500 font-normal bg-green-100 rounded-2xl">Active</span>';
                    } else if ($project->status == 0) {
                        return '<span class="inline-block px-7 py-1 text-xs text-red-500 font-normal bg-red-100 rounded-2xl">Inactive</span>';
                    }
                })
                ->addColumn('action', function ($project) {
                    $actionDropdown = '
                        <div class="flex gap-1 text-white justify-end">
                            <a href="' . route('project.detail', $project->slug) . '" target="_blank" class="text-xs font-semibold text-white px-7 py-2 rounded-lg bg-primary hover:bg-primaryHover">
                                View
                            </a>
                            <a href="' . route('admin.projects.edit', $project) . '" class="text-xs font-semibold text-white px-7 py-2 rounded-lg bg-primary hover:bg-primaryHover">
                                Edit
                            </a>
                        </div>';
                    return $actionDropdown;
                })
                ->addIndexColumn()
                ->rawColumns(['counter', 'image', 'name', 'promotion', 'date', 'category', 'status', 'action'])
                ->make(true);
        }
    }

    public function create()
    {
        $categories = Category::where('status', 1)->latest()->get();
        
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'arabic_title' => 'required|string',
            'short_description' => 'required|string',
            'arabic_short_description' => 'required|string',
            'description' => 'required|string',
            'arabic_description' => 'required|string',
            'country' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'category' => 'required|exists:categories,id',
            'images' => 'required|array|min:3|max:10',
            'images.*' => 'required|string',
            'is_featured' => 'required',
            'tags' => 'required|string|max:500'
        ]);

        try {

            DB::beginTransaction();

            if (!empty($request->tags)) {
                $tags = array_map('trim', explode(',', $request->tags));
                $tags = array_filter($tags); // remove empty ones
                $tags = array_unique($tags); // prevent duplicates

                // Optional: sanitize & limit length
                $tags = array_map(function ($tag) {
                    $tag = strtolower($tag); // normalize case
                    $tag = preg_replace('/[^a-z0-9\s\-]/i', '', $tag); // allow only letters, numbers, spaces, dashes
                    return substr($tag, 0, 50); // limit each tag to 50 chars
                }, $tags);

                // Optional: remove empty after sanitization
                $tags = array_filter($tags);
            } else {
                $tags = [];
            }

            $project = Project::create([
                'title' => $request->title,
                'arabic_title' => $request->arabic_title,
                'short_description' => $request->short_description,
                'arabic_short_description' => $request->arabic_short_description,
                'description' => $request->description,
                'arabic_description' => $request->arabic_description,
                'slug' => Str::slug($request->title),
                'country' => $request->country,
                'province' => $request->province,
                'city' => $request->city,
                'property_location' => $request->property_location,
                'category_id' => $request->category,
                'is_featured' => $request->is_featured,
                'tags' => $tags
            ]);

            foreach ($request->images as $image) {
                $project->images()->create([
                    'name' => $image,
                    'size' => 0,
                    'path' => 'uploads/projects/images/' . date('Y') . '/' . date('m') . '/' . $image,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.projects')->with('success', 'Project added successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your request. Please try again later.' . $e->getMessage());
        }
    }
    
    public function storeImage(Request $request)
    {
        $path = public_path('uploads/projects/images/' . date('Y') . '/' . date('m'));

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function edit (Project $project) {
        try {
            $categories = Category::where('status', 1)->latest()->get();
            return view('admin.projects.edit', compact('project', 'categories'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Project not found');
        }
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string',
            'arabic_title' => 'required|string',
            'short_description' => 'required|string',
            'arabic_short_description' => 'required|string',
            'description' => 'required|string',
            'arabic_description' => 'required|string',
            'country' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'category' => 'required|exists:categories,id',
            'images' => 'required|array|min:3|max:10',
            'images.*' => 'required|string',
            'is_featured' => 'required',
            'tags' => 'required|string|max:500'
        ]);

        try {

            DB::beginTransaction();

            if (!empty($request->tags)) {
                $tags = array_map('trim', explode(',', $request->tags));
                $tags = array_filter($tags); // remove empty ones
                $tags = array_unique($tags); // prevent duplicates

                // Optional: sanitize & limit length
                $tags = array_map(function ($tag) {
                    $tag = strtolower($tag); // normalize case
                    $tag = preg_replace('/[^a-z0-9\s\-]/i', '', $tag); // allow only letters, numbers, spaces, dashes
                    return substr($tag, 0, 50); // limit each tag to 50 chars
                }, $tags);

                // Optional: remove empty after sanitization
                $tags = array_filter($tags);
            } else {
                $tags = [];
            }

            $project->update([
                'title' => $request->title,
                'arabic_title' => $request->arabic_title,
                'short_description' => $request->short_description,
                'arabic_short_description' => $request->arabic_short_description,
                'description' => $request->description,
                'arabic_description' => $request->arabic_description,
                'slug' => Str::slug($request->title),
                'country' => $request->country,
                'province' => $request->province,
                'city' => $request->city,
                'property_location' => $request->property_location,
                'category_id' => $request->category,
                'is_featured' => $request->is_featured,
                'tags' => $tags
            ]);

            // Delete old images if new images are provided
            if ($request->images && $project->images) {
                foreach ($project->images as $image) {
                    if (file_exists(public_path($image->path))) {
                        unlink(public_path($image->path));
                    }
                    $image->delete();
                }
            }

            // Insert new images
            foreach ($request->images as $image) {
                ProjectImage::create([
                    'name' => $image,
                    'size' => 0,
                    'path' => 'uploads/projects/images/' . date('Y') . '/' . date('m') . '/' . $image,
                    'project_id' => $project->id
                ]);
            }

            DB::commit();
            return redirect()->route('admin.projects')->with('success', 'Project edit successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while processing your request. Please try again later.' . $e->getMessage());
        }
    }

}