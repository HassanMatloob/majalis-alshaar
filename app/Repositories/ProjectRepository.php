<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Project;

use App\Interfaces\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function filteredProjects(array $filters)
    {
        $query = Project::query();

        if (isset($filters["category"])) {
            if(session('locale', config('app.locale')) == 'en') {
                $categoryId = Category::where('name', $filters["category"])->first()?->id;
            } else {
                $categoryId = Category::where('arabic_name', $filters["category"])->first()?->id;
            }

            $query->where("category_id", $categoryId)->where("status", 1);
        }

        return $query->get();
    }
}

