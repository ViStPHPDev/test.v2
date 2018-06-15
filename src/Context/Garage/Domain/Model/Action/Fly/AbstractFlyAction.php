<?php

namespace App\Garage\Domain\Model\Action\Fly;

use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Action\AbstractAction;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Class AbstractFlyAction
 * @package App\Garage\Domain\Model\Action\Fly
 */
abstract class AbstractFlyAction extends AbstractAction implements FlyActionInterface
{
    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function fly(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$vehicle->getName()} flying";
    }
}