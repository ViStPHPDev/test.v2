<?php

namespace App\Garage\Application\Factory;

use App\Garage\Application\Manager\GarageManager;

/**
 * Class GarageManagerFactory
 * @package App\Garage\Application\Factory
 */
class GarageManagerFactory
{
    /**
     * @param iterable $elements
     * @return GarageManager
     */
    public static function create(iterable $elements = [])
    {
        return new GarageManager($elements);
    }
}