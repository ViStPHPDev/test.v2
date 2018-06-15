<?php

namespace App\Garage\Domain\Model\Vehicle\Land\Horse;

use App\Garage\Domain\Adapter\Fuel\FuelInterface;
use App\Garage\Domain\Adapter\Fuel\Oats;
use App\Garage\Domain\Model\Vehicle\Land\AbstractLandVehicle;

/**
 * Class AbstractHorse
 * @package App\Garage\Domain\Model\Vehicle\Land\Horse
 */
abstract class AbstractHorse extends AbstractLandVehicle implements HorseInterface
{
    /**
     * @param FuelInterface $fuel
     * @return bool
     */
    public function isFuelSupport(FuelInterface $fuel): bool
    {
        return in_array(get_class($fuel), [
            Oats::class,
        ]);
    }
}