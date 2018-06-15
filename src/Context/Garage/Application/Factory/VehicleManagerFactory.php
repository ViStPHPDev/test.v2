<?php

namespace App\Garage\Application\Factory;

use App\Garage\Application\Manager\VehicleManager;
use App\Garage\Application\Manager\VehicleManagerInterface;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;

/**
 * Class VehicleManagerFactory
 * @package App\Vehicle\Application\Factory
 */
final class VehicleManagerFactory
{
    /** @var  VehicleManagerInterface */
    private static $manager;

    /**
     * @param VehicleInterface $vehicle
     * @return VehicleManager
     */
    public static function create(VehicleInterface $vehicle)
    {
        if (!(self::$manager instanceof VehicleManagerInterface)) {
            self::$manager =  new VehicleManager();
        }
        return self::$manager->setVehicle($vehicle);
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}