<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Property;
use App\Enums\AgencyStatus;
use Illuminate\Http\Request;

use App\Enums\PropertyStatus;
use App\Services\PropertyService;

class PropertyController extends Controller
{
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function index(Request $request)
    {
        $filters = [
            'type' => $request->query('type'),
            'category' => $request->query('cat'),
        ];

        if (!$filters['category']) {
            $filters['category'] = 'residential';
        }

        $categories = Category::all();

        $properties = $this->propertyService->getFilteredProperties($filters);

        return view('pages.properties.list', compact('categories', 'properties'));
    }

    public function getPropertiesByCategory(Request $request)
    {
        $category = $request->query->get('cat');
        $categoryId = Category::where('name', $category)->first()->id;

        $properties = Property::where('category_id', $categoryId)
            ->where('status', PropertyStatus::APPROVED->value)
            ->whereHas('agent.agency', function ($query) {
                $query->where('status', '<>', AgencyStatus::DISABLED->value);
            })
            ->with('images')->with('category')->with('agent')
            ->get();

        return response()->json(['properties' => $properties]);
    }

    public function show($id)
    {
        try {
            $property = Property::findOrFail($id);
            return view('pages.properties.show', compact('property'));
        } catch (\Exception $e) {
            return redirect()->route('properties')->with('error', 'Property not found');
        }
    }
}
