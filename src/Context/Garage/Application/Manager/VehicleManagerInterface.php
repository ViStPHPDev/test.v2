<?php

namespace App\Garage\Application\Manager;

use App\Garage\Domain\Model\Action\ActionInterface;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Interface VehicleManagerInterface
 * @package App\Garage\Application\Manager
 */
interface VehicleManagerInterface
{
    /**
     * @return VehicleInterface
     */
    public function getVehicle(): VehicleInterface;

    /**
     * @param VehicleInterface $vehicle
     * @return mixed
     */
    public function setVehicle(VehicleInterface $vehicle);

    /**
     * @param ActionInterface $action
     * @return mixed
     */
    public function addAction(ActionInterface $action);

    /**
     * @param array $new_actions
     * @return mixed
     */
    public function addActions(array $new_actions);

    /**
     * @param string $action_interface
     * @return mixed
     */
    public function removeAction(string $action_interface);

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments);
}