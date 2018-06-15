<?php

namespace App\Garage\Domain\Model\Vehicle\Air;

use App\Garage\Domain\Adapter\Fuel\FuelInterface;
use App\Garage\Domain\Adapter\Fuel\Gas;
use App\Garage\Domain\Model\Vehicle\AbstractVehicle;

/**
 * Class AbstractAirVehicle
 * @package App\Garage\Domain\Model\Vehicle\Air
 */
abstract class AbstractAirVehicle extends AbstractVehicle implements AirVehicleInterface
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