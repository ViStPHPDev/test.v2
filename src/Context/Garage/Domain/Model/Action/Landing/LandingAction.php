<?php

namespace App\Garage\Domain\Model\Action\Landing;

/**
 * Class LandingAction
 * @package App\Garage\Domain\Model\Action\Landing
 */
class LandingAction extends AbstractLandingAction
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return LandingActionInterface::class;
    }
}