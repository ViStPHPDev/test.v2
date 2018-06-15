<?php

namespace App\Garage\Domain\Model\Vehicle\Land;

use App\Garage\Domain\Adapter\Fuel\FuelInterface;
use App\Garage\Domain\Adapter\Fuel\Gas;
use App\Garage\Domain\Model\Vehicle\AbstractVehicle;

/**
 * Class AbstractLandVehicle
 * @package App\Garage\Domain\Model\Vehicle\Land
 */
abstract class AbstractLandVehicle extends AbstractVehicle implements LandVehicleInterface
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