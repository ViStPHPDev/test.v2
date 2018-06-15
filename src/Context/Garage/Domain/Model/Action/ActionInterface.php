<?php

namespace App\Garage\Domain\Model\Action;

use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Interface ActionInterface
 * @package App\Garage\Domain\Model\Action
 */
interface ActionInterface
{
    /**
     * @param VehicleInterface $vehicle
     */
    public function setVehicle(VehicleInterface $vehicle): void;

    /**
     * @return VehicleInterface
     */
    public function getVehicle(): VehicleInterface;

    /**
     * @return string
     */
    public function getInterface(): string;
}