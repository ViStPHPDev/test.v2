<?php

namespace App\Garage\Domain\Model\Action\TakeOff;

use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Action\AbstractAction;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Class AbstractTakeOffAction
 * @package App\Garage\Domain\Model\Action\TakeOff
 */
abstract class AbstractTakeOffAction extends AbstractAction implements TakeOffActionInterface
{
    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function takeOff(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$vehicle->getName()} took off";
    }
}