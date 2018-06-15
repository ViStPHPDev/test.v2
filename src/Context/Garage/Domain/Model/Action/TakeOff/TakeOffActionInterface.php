<?php

namespace App\Garage\Domain\Model\Action\TakeOff;

use App\Garage\Domain\Model\Action\ActionInterface;

/**
 * Interface TakeOffActionInterface
 * @package App\Garage\Domain\Model\Action\TakeOff
 */
interface TakeOffActionInterface extends ActionInterface
{
    /**
     * @return string
     */
    public function takeOff(): string;
}