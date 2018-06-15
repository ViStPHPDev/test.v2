<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Domain\Factory\VehicleFactory;
use App\Garage\Domain\Model\Vehicle\VehicleInterface;
use PHPUnit\Framework\TestCase;

class TruckTest extends TestCase
{
    /**
     * @return VehicleInterface
     */
    public function testCreateTruckWithFactory()
    {
        $truck = VehicleFactory::create(VehicleFactory::LAND_TRUCK, 'Truck');
        $this->assertSame('Truck', $truck->getName());
        return $truck;
    }
}
