<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Plan;
use Illuminate\Http\Request;
use DataTables;

class CategoryController extends Controller
{
    public function index () {
        return view('admin.categories.list');
    }

    public function fetch(Request $request) {
        if ($request->ajax()) {
            $categories = Category::where('status', 1)->latest()->get();

            return DataTables::of($categories)
                ->addColumn('check', function ($category) {
                    return '<input type="checkbox" name="ids[]" value="' . $category->id . '" class="checkbox">';
                })
                ->addColumn('name', function ($category) {
                    return '<span class="pt-10 text-sm font-medium text-secondary">' . $category->name . ' (' . $category->arabic_name . ')' . '</span>';
                })
                ->addColumn('parent', function ($category) {
                    return '<span class="pt-10 text-sm font-medium text-primary">' .$category->parentCategory?->name . ' (' . $category->parentCategory?->arabic_name . ')' . '</span>';
                })
                ->addColumn('order', function ($category) {
                    return '<span class="pt-10 text-sm text-black font-medium">' . $category->order ?? '-' . '</span>';
                })
                ->addColumn('status', function ($category) {
                    if($category->status) {
                        return '<span class="inline-block px-7 py-1 text-xs text-green-500 font-normal bg-green-100 rounded-2xl">Active</span>';
                    } else {
                        return '<span class="inline-block px-7 py-1 text-xs text-red-500 font-normal bg-red-100 rounded-2xl">Inactive</span>';
                    }
                })
                ->addColumn('action', function ($category) {
                    $actionDropdown = '
                        <div class="flex gap-1 text-white justify-end">
                            <a href="' . route('admin.categories.edit', $category) . '" class="text-2xl bg-primary hover:bg-primaryHover  p-2 rounded-lg">
                                <i class="bx bxs-pencil "></i>
                            </a>
                            <form action="' . route('admin.categories.destroy', $category) . '" method="POST" onsubmit="return confirm(\'Are you sure you want to delete this request?\')">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="text-2xl bg-primary hover:bg-primaryHover p-2 rounded-lg">
                                    <i class="bx bx-trash-alt"></i>
                                </button>
                            </form>
                        </div>';
                    return $actionDropdown;
                })
                ->addIndexColumn()
                ->rawColumns(['check', 'name', 'parent', 'order', 'status', 'action'])
                ->make(true);
        }
    }

    public function create () {
        $categories = Category::where('status', 1)->latest()->get();
        return view('admin.categories.create', compact('categories'));
    }

    public function store (Request $request) {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'arabic_name' => ['required', 'string', 'max:255'],
                'order' => ['required', 'numeric', 'unique:categories,order', 'min:0'],
                'parent_id' => ['nullable', 'exists:categories,id'],
                'status' => ['required', 'boolean'],
            ]);

            $category = Category::create([
                'name' => $request['name'],
                'arabic_name' => $request['arabic_name'],
                'order' => $request['order'],
                'parent_id' => $request['parent_id'] ?? 0,
                'status' => $request['status'],
            ]);

            return redirect()->route('admin.categories')->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, please try again later.' . $e->getMessage());
        }
    }

    public function edit (Category $category) {
        try {
            $categories = Category::where('status', 1)->latest()->get();
            return view('admin.categories.edit', compact('categories', 'category'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Category request not found.');
        }
    }

    public function update (Request $request, Category $category) {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'arabic_name' => ['required', 'string', 'max:255'],
            'order' => ['required', 'numeric', 'unique:categories,order,'.$category->id, 'min:0'],
            'parent_id' => ['nullable', 'exists:categories,id'],
            'status' => ['required', 'boolean'],
        ]);

        try {
            $validatedData['parent_id'] = $validatedData['parent_id'] ?? 0;
            $category->update($validatedData);

            return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong, please try again later.' . $e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->ids;
        Category::whereIn('id', $ids)->delete();
        return response()->json(['success' => "Selected categories deleted successfully."]);
    }

    public function singleDelete(Category $category)
    {
        try {
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }
}
