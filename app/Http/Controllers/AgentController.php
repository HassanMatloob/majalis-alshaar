<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Agent;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Enums\PropertyStatus;
use App\Enums\AgencyStatus;

class AgentController extends Controller
{
    public function show($agent)
    {
        try {
            $properties = Property::where('agent_id', $agent)
                ->where('status', PropertyStatus::APPROVED->value)
                ->whereHas('agent.agency', function ($query) {
                    $query->where('status', '<>', AgencyStatus::DISABLED->value);
                })
                ->get();
            $agent = Agent::findOrFail($agent);
            return view('pages.agents.show', compact('agent', 'properties'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Agent not found');
        }
    }
}
