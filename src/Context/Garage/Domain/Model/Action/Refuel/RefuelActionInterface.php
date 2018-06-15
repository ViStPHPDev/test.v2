<?php

namespace App\Garage\Domain\Model\Action\Refuel;

use App\Garage\Domain\Adapter\Fuel\FuelInterface;

/**
 * Interface RefuelInterface
 * @package App\Garage\Domain\Model\Action\Refuel
 */
interface RefuelActionInterface
{
    /**
     * @param FuelInterface $fuel
     * @return string
     */
    public function refuel(FuelInterface $fuel): string;
}