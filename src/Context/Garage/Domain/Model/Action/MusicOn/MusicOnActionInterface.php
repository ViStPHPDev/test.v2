<?php

namespace App\Garage\Domain\Model\Action\MusicOn;

use App\Garage\Domain\Model\Action\ActionInterface;

/**
 * Interface MusicOnActionInterface
 * @package App\Garage\Domain\Model\Action\MusicOn
 */
interface MusicOnActionInterface extends ActionInterface
{
    /**
     * @return string
     */
    public function musicOn(): string;
}