<?php

namespace App\Garage\Domain\Model\Action\EmptyLoads;

use App\Garage\Domain\Adapter\Cargo\CargoInterface;
use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Action\AbstractAction;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Class AbstractEmptyLoadsAction
 * @package App\Garage\Domain\Model\Action\EmptyLoads
 */
abstract class AbstractEmptyLoadsAction extends AbstractAction implements EmptyLoadsActionInterface
{
    /**
     * @param CargoInterface $cargo
     * @return string
     * @throws VehicleNotSetException
     */
    public function emptyLoads(CargoInterface $cargo): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$vehicle->getName()} unloaded {$cargo->getName()}";
    }
}