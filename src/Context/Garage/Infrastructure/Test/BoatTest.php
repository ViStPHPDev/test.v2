<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Domain\Exception\VehicleTypeIncorrectException;
use App\Garage\Domain\Factory\VehicleFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class BoatTest
 * @package App\Garage\Infrastructure\Test
 */
class BoatTest extends TestCase
{
    public function testVehicleTypeIncorrectException()
    {
        $this->expectException(VehicleTypeIncorrectException::class);
        $boat = VehicleFactory::create('Chopper', 'Chopper');
    }

    public function testCreateBoatWithFactory()
    {
        $boat = VehicleFactory::create(VehicleFactory::WATER_BOAT, 'Boat');
        $this->assertSame('Boat', $boat->getName());
        return $boat;
    }
}
