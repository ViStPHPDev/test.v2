<?php

namespace App\Garage\Domain\Model\Action\Swim;

use App\Garage\Domain\Model\Action\ActionInterface;

/**
 * Interface SwimActionInterface
 * @package App\Garage\Domain\Model\Action\Swim
 */
interface SwimActionInterface extends ActionInterface
{
    /**
     * @return string
     */
    public function swim(): string;
}