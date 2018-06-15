<?php

namespace App\Garage\Domain\Model\Vehicle;

use App\Garage\Domain\Adapter\Fuel\FuelInterface;

/**
 * Class AbstractVehicle
 * @package App\Garage\Domain\Model\Vehicle
 */
abstract class AbstractVehicle implements VehicleInterface
{
    /** @var  string */
    protected $name;

    /**
     * AbstractVehicle constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * @param string $name
     * @return VehicleInterface
     */
    public function setName(string $name): VehicleInterface
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param FuelInterface $fuel
     * @return bool
     */
    public function isFuelSupport(FuelInterface $fuel): bool
    {
        return true;
    }
}