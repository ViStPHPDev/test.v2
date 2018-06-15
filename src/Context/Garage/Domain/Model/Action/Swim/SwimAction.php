<?php

namespace App\Garage\Domain\Model\Action\Swim;

/**
 * Class SwimAction
 * @package App\Garage\Domain\Model\Action\Swim
 */
class SwimAction extends AbstractSwimAction
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return SwimActionInterface::class;
    }
}