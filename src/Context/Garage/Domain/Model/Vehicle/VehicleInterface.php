<?php

namespace App\Garage\Domain\Model\Vehicle;

use App\Garage\Domain\Adapter\Fuel\FuelInterface;

/**
 * Interface VehicleInterface
 * @package App\Garage\Domain\Model\Vehicle
 */
interface VehicleInterface
{
    /**
     * @param string $name
     * @return VehicleInterface
     */
    public function setName(string $name): VehicleInterface;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param FuelInterface $fuel
     * @return bool
     */
    public function isFuelSupport(FuelInterface $fuel): bool;
}