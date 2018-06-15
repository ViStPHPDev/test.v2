<?php

namespace App\Garage\Domain\Factory;

use App\Garage\Domain\Model\Vehicle\Air\AirVehicleInterface;
use App\Garage\Domain\Model\Vehicle\Air\Plane\PlaneInterface;
use App\Garage\Domain\Model\Vehicle\Land\Car\CarInterface;
use App\Garage\Domain\Model\Vehicle\Land\LandVehicleInterface;
use App\Garage\Domain\Model\Vehicle\Land\Truck\TruckInterface;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;
use App\Garage\Domain\Model\Vehicle\Water\Boat\BoatInterface;
use App\Garage\Domain\Model\Vehicle\Water\WaterVehicleInterface;
use App\Garage\Domain\Repository\ActionRepository;
use App\Garage\Domain\Repository\ActionRepositoryInterface;

/**
 * Class ActionRepositoryFactory
 * @package App\Garage\Domain\Factory
 */
final class ActionRepositoryFactory
{
    /** @var  ActionRepository */
    protected static $repository;

    /**
     * @return ActionRepositoryInterface
     */
    public static function create()
    {
        if (!(self::$repository instanceof ActionRepository)) {
            self::$repository = new ActionRepository([
                VehicleInterface::class => [
                    ActionFactory::create(ActionFactory::ACTION_REFUEL),
                    ActionFactory::create(ActionFactory::ACTION_STOP),
                    ActionFactory::create(ActionFactory::ACTION_MOVE),
                ],
                LandVehicleInterface::class => [
                ],
                CarInterface::class => [
                    ActionFactory::create(ActionFactory::ACTION_MUSIC_ON),
                ],
                TruckInterface::class => [
                    ActionFactory::create(ActionFactory::ACTION_EMPTY_LOADS),
                ],
                AirVehicleInterface::class => [
                    ActionFactory::create(ActionFactory::ACTION_TAKE_OFF),
                    ActionFactory::create(ActionFactory::ACTION_FLY),
                    ActionFactory::create(ActionFactory::ACTION_LANDING),
                ],
                PlaneInterface::class => [
                ],
                WaterVehicleInterface::class => [
                    ActionFactory::create(ActionFactory::ACTION_SWIM),
                ],
                BoatInterface::class => [
                ]
            ]);
        }
        return self::$repository;
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