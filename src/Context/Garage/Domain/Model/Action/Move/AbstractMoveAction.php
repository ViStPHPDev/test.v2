<?php

namespace App\Garage\Domain\Model\Action\Move;

use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Action\AbstractAction;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Class AbstractMoveAction
 * @package App\Garage\Domain\Model\Action\Move
 */
abstract class AbstractMoveAction extends AbstractAction implements MoveActionInterface
{
    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function move(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$this->getVehicle()->getName()} moving";
    }
}