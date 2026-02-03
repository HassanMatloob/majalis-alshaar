<?php

namespace App\Interfaces;

interface PropertyRepositoryInterface
{
    public function filteredProperties(array $filters);
}
