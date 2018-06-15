<?php

namespace App\Garage\Domain\Model\Action;

use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Class AbstractAction
 * @package App\Garage\Domain\Model\Action
 */
abstract class AbstractAction implements ActionInterface
{
    /**
     * @var VehicleInterface
     */
    protected $vehicle;

    /**
     * @param VehicleInterface $vehicle
     */
    public function setVehicle(VehicleInterface $vehicle): void
    {
        $this->vehicle = $vehicle;
    }

    /**
     * @return VehicleInterface
     */
    public function getVehicle(): VehicleInterface
    {
        return $this->vehicle;
    }
}