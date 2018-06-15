<?php

namespace App\Garage\Domain\Model\Action\Swim;

use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Action\AbstractAction;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Class AbstractSwimAction
 * @package App\Garage\Domain\Model\Action\Swim
 */
abstract class AbstractSwimAction extends AbstractAction implements SwimActionInterface
{
    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function swim(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$vehicle->getName()} swimming";
    }
}