<?php

namespace App\Garage\Domain\Model\Action\Fly;

/**
 * Class FlyAction
 * @package App\Garage\Domain\Model\Action\Fly
 */
class FlyAction extends AbstractFlyAction
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return FlyActionInterface::class;
    }

}