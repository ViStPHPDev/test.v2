<?php

namespace App\Garage\Domain\Model\Action\Landing;

use App\Garage\Domain\Model\Action\ActionInterface;

/**
 * Interface LandingActionInterface
 * @package App\Garage\Domain\Model\Action\Landing
 */
interface LandingActionInterface extends ActionInterface
{
    /**
     * @return string
     */
    public function landing(): string;
}