<?php

namespace App\Garage\Domain\Model\Action\Landing;

use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Action\AbstractAction;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Class AbstractLandingAction
 * @package App\Garage\Domain\Model\Action\Landing
 */
abstract class AbstractLandingAction extends AbstractAction implements LandingActionInterface
{
    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function landing(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$vehicle->getName()} landing";
    }
}