<?php

namespace App\Garage\Application\Manager;

use App\Garage\Domain\Repository\VehicleRepositoryInterface;

/**
 * Interface GarageManagerInterface
 * @package App\Garage\Application
 */
interface GarageManagerInterface
{
    public function setVehicles(VehicleRepositoryInterface $repository);
    public function getVehicles(): VehicleRepositoryInterface;
}