<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Property;

use App\Enums\AgencyStatus;
use App\Enums\PropertyStatus;
use App\Interfaces\PropertyRepositoryInterface;

class PropertyRepository implements PropertyRepositoryInterface
{
    public function filteredProperties(array $filters)
    {
        $query = Property::query();

        if (isset($filters["category"])) {
            $categoryId = Category::where('name', $filters["category"])->first()->id;
            $query->where("category_id", $categoryId)
                ->where("status", PropertyStatus::APPROVED->value)
                ->whereHas('agent.agency', function ($query) {
                    $query->where('status', '<>', AgencyStatus::DISABLED->value);
                });
        }

        if (isset($filters["type"])) {
            $query->where("type", $filters["type"]);
        }

        return $query->get();
    }
}

