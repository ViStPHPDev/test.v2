<?php

namespace App\Service;

use App\Cargo\Infrastructure\Web\Service\CargoService as Cargo;
use App\Fuel\Infrastructure\Web\Service\FuelService as Fuel;
use App\Garage\Infrastructure\Web\Service\GarageService as Garage;
use App\Service\Traits\CargoTrait;
use App\Service\Traits\FuelTrait;
use App\Service\Traits\GarageTrait;

/**
 * Class GarageService
 * @package App\Service
 */
class GarageService
{
    use
        GarageTrait,
        FuelTrait,
        CargoTrait;

    /**
     * GarageService constructor.
     */
    public function __construct()
    {
        $this->setGarage(new Garage());
        $this->setFuel(new Fuel());
        $this->setCargo(new Cargo());
    }

    /**
     * @return array
     */
    public function garageTest()
    {
        return $this->getGarage()
            ->addFuel($this->getFuel()->getGas())
            ->addFuel($this->getFuel()->getOats())
            ->addCargo($this->getCargo()->getBulk())
            ->garageTest();
    }
}