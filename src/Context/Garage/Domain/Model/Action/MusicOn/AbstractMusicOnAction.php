<?php

namespace App\Garage\Domain\Model\Action\MusicOn;

use App\Garage\Domain\Exception\VehicleNotSetException;
use App\Garage\Domain\Model\Action\AbstractAction;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Class AbstractMusicOnAction
 * @package App\Garage\Domain\Model\Action\MusicOn
 */
abstract class AbstractMusicOnAction extends AbstractAction implements MusicOnActionInterface
{
    /**
     * @return string
     * @throws VehicleNotSetException
     */
    public function musicOn(): string
    {
        if (!(($vehicle = $this->getVehicle()) instanceof VehicleInterface)) {
            throw new VehicleNotSetException();
        }
        return "{$vehicle->getName()} music switched on";
    }
}