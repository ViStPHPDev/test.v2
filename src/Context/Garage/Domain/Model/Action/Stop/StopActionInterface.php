<?php

namespace App\Garage\Domain\Model\Action\Stop;

use App\Garage\Domain\Model\Action\ActionInterface;

/**
 * Interface StopActionInterface
 * @package App\Garage\Domain\Model\Action\Stop
 */
interface StopActionInterface extends ActionInterface
{
    /**
     * @return string
     */
    public function stop(): string;
}