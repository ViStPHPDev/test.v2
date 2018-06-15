<?php

namespace App\Garage\Infrastructure\Test;

use App\Garage\Domain\Factory\VehicleFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class HelicopterTest
 * @package App\Garage\Infrastructure\Test
 */
class HelicopterTest extends TestCase
{
    public function testCreateHelicopterWithFactory()
    {
        $helicopter = VehicleFactory::create(VehicleFactory::AIR_HELICOPTER, 'Helicopter');
        $this->assertSame('Helicopter', $helicopter->getName());
        return $helicopter;
    }
}
