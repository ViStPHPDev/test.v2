<?php

namespace App\Garage\Domain\Model\Action\Move;

/**
 * Class MoveAction
 * @package App\Garage\Domain\Model\Action\Move
 */
class MoveAction extends AbstractMoveAction
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return MoveActionInterface::class;
    }
}