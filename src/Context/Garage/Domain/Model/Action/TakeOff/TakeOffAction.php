<?php

namespace App\Garage\Domain\Model\Action\TakeOff;

/**
 * Class TakeOffAction
 * @package App\Garage\Domain\Model\Action\TakeOff
 */
class TakeOffAction extends AbstractTakeOffAction
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return TakeOffActionInterface::class;
    }

}