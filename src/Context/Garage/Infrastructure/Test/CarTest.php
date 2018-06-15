<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Domain\Factory\VehicleFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class CarTest
 * @package App\Garage\Infrastructure\Test
 */
class CarTest extends TestCase
{
    public function testCreateCarWithFactory()
    {
        $car = VehicleFactory::create(VehicleFactory::LAND_CAR, 'Car');
        $this->assertSame('Car', $car->getName());
        return $car;
    }
}
