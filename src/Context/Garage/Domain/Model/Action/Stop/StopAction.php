<?php

namespace App\Garage\Domain\Model\Action\Stop;

/**
 * Class StopAction
 * @package App\Garage\Domain\Model\Action\Stop
 */
class StopAction extends AbstractStopAction
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return StopActionInterface::class;
    }

}