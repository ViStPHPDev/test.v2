<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Domain\Factory\VehicleFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class PlaneTest
 * @package App\Garage\Infrastructure\Test
 */
class PlaneTest extends TestCase
{
    public function testCreatePlaneWithFactory()
    {
        $plane = VehicleFactory::create(VehicleFactory::AIR_PLANE, 'Plane');
        $this->assertSame('Plane', $plane->getName());
        return $plane;
    }
}
