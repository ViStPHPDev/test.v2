<?php

namespace App\Garage\Domain\Model\Action\EmptyLoads;

use App\Garage\Domain\Adapter\Cargo\CargoInterface;
use App\Garage\Domain\Model\Action\ActionInterface;

/**
 * Interface EmptyLoadsActionInterface
 * @package App\Garage\Domain\Model\Action\EmptyLoads
 */
interface EmptyLoadsActionInterface extends ActionInterface
{
    /**
     * @param CargoInterface $cargo
     * @return string
     */
    public function emptyLoads(CargoInterface $cargo): string;
}