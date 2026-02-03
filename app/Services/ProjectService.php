<?php

namespace App\Services;

use App\Interfaces\ProjectRepositoryInterface;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function getFilteredProjects(array $filters)
    {
        return $this->projectRepository->filteredProjects($filters);
    }
}
