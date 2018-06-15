<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Domain\Factory\VehicleFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class MotorcycleTest
 * @package App\Garage\Infrastructure\Test
 */
class MotorcycleTest extends TestCase
{
    public function testCreateMotorcycleWithFactory()
    {
        $motorcycle = VehicleFactory::create(VehicleFactory::LAND_MOTORCYCLE, 'Motorcycle');
        $this->assertSame('Motorcycle', $motorcycle->getName());
        return $motorcycle;
    }
}
