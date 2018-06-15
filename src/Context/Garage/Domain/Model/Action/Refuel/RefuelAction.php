<?php

namespace App\Garage\Domain\Model\Action\Refuel;

/**
 * Class RefuelAction
 * @package App\Garage\Domain\Model\Action\Refuel
 */
class RefuelAction extends AbstractRefuelAction
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return RefuelActionInterface::class;
    }

}