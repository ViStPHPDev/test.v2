<?php

namespace App\Garage\Domain\Model\Action\Fly;

use App\Garage\Domain\Model\Action\ActionInterface;

/**
 * Interface FlyActionInterface
 * @package App\Garage\Domain\Model\Action\Fly
 */
interface FlyActionInterface extends ActionInterface
{
    /**
     * @return string
     */
    public function fly(): string;
}