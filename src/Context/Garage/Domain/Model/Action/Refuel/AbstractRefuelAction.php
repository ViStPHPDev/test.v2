<?php

namespace App\Garage\Domain\Model\Action\Refuel;

use App\Garage\Domain\Adapter\Fuel\FuelInterface;
use App\Garage\Domain\Exception\FuelTypeNotSupportedException;
use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Action\AbstractAction;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Class AbstractRefuel
 * @package App\Garage\Domain\Model\Action\Refuel
 */
abstract class AbstractRefuelAction extends AbstractAction implements RefuelActionInterface
{
    /**
     * @param FuelInterface $fuel
     * @return string
     * @throws FuelTypeNotSupportedException
     * @throws VehicleNotSetException
     */
    public function refuel(FuelInterface $fuel): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        if (!$vehicle->isFuelSupport($fuel)) {
            throw new FuelTypeNotSupportedException();
        }
        return "{$this->getVehicle()->getName()} refuel {$fuel->getName()}";
    }
}