<?php

namespace App\Services;

use App\Interfaces\PropertyRepositoryInterface;

class PropertyService
{
    protected $propertyRepository;

    public function __construct(PropertyRepositoryInterface $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    public function getFilteredProperties(array $filters)
    {
        return $this->propertyRepository->filteredProperties($filters);
    }
}
