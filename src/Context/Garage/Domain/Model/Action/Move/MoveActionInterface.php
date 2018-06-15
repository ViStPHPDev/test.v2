<?php

namespace App\Garage\Domain\Model\Action\Move;

use App\Garage\Domain\Model\Action\ActionInterface;

/**
 * Interface MoveActionInterface
 * @package App\Garage\Domain\Model\Action\Move
 */
interface MoveActionInterface extends ActionInterface
{
    /**
     * @return string
     */
    public function move(): string;
}