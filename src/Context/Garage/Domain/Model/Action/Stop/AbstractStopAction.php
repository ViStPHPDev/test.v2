<?php

namespace App\Garage\Domain\Model\Action\Stop;

use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Action\AbstractAction;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Class AbstractStopAction
 * @package App\Garage\Domain\Model\Action\Stop
 */
abstract class AbstractStopAction extends AbstractAction implements StopActionInterface
{
    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function stop(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$this->getVehicle()->getName()} stopped";
    }
}