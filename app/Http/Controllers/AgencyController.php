<?php

namespace App\Http\Controllers;

use App\Enums\PropertyStatus;
use App\Models\Agent;
use App\Models\Agency;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    public function index(Request $request) {
        $agencies = Agency::query()
            ->approved()
            ->withCount(['properties as approved_properties' => function ($query) {
                $query->where('properties.status', PropertyStatus::APPROVED->value);
            }])
            ->paginate(2);
        
        $totalAgencies = Agency::query()->approved()->count();

        if ($request->ajax()) {
            $view = view('components.agency-card', compact('agencies'))->render();
            return response()->json(['html' => $view]);
        }

        return view('pages.agencies.list', compact('agencies', 'totalAgencies'));
    }

    public function show($id) {
        $agency = Agency::where('id', $id)
            ->withCount(['properties as rent_properties_count' => function ($query) {
                $query->where('properties.type', 'rent')
                    ->where('properties.status', PropertyStatus::APPROVED->value);
            }])
            ->withCount(['properties as sale_properties_count' => function ($query) {
                $query->where('properties.type', 'sell')
                    ->where('properties.status', PropertyStatus::APPROVED->value);
            }])->first();

        $agents = Agent::where('agency_id', $id)
            ->withCount(['properties as properties_count' => function ($query) {
                $query->where('properties.status', 'approved');
            }])
            ->get();

        return view('pages.agencies.show', compact('agency', 'agents'));
    }
}
