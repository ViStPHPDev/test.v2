<?php

namespace App\Test;

use App\Controller\AppController;
use PHPUnit\Framework\TestCase;

/**
 * Class IndexTest
 * @package App\Garage\Infrastructure\Test
 */
class IndexTest extends TestCase
{
    public function testIndexController()
    {
        $controller = new AppController();
        $result = array_keys(json_decode($controller->index(), true));
        $this->assertContains('BMW', $result);
    }
}
