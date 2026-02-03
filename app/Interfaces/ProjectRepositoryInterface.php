<?php

namespace App\Interfaces;

interface ProjectRepositoryInterface
{
    public function filteredProjects(array $filters);
}
