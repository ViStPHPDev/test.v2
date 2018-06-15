<?php

namespace App\Garage\Domain\Model\Vehicle\Water;

use App\Garage\Domain\Adapter\Fuel\FuelInterface;
use App\Garage\Domain\Adapter\Fuel\Gas;
use App\Garage\Domain\Model\Vehicle\AbstractVehicle;

/**
 * Class AbstractWaterVehicle
 * @package App\Garage\Domain\Model\Vehicle\Water
 */
abstract class AbstractWaterVehicle extends AbstractVehicle implements WaterVehicleInterface
{
    /**
     * @param FuelInterface $fuel
     * @return bool
     */
    public function isFuelSupport(FuelInterface $fuel): bool
    {
        return in_array(get_class($fuel), [
            Gas::class,
        ]);
    }
}