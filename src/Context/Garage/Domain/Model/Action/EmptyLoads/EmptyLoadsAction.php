<?php

namespace App\Garage\Domain\Model\Action\EmptyLoads;

/**
 * Class EmptyLoadsAction
 * @package App\Garage\Domain\Model\Action\EmptyLoads
 */
class EmptyLoadsAction extends AbstractEmptyLoadsAction
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return EmptyLoadsActionInterface::class;
    }
}