<?php

namespace App\Garage\Domain\Model\Action\MusicOn;

/**
 * Class MusicOnAction
 * @package App\Garage\Domain\Model\Action\MusicOn
 */
class MusicOnAction extends AbstractMusicOnAction
{
    /**
     * @return string
     */
    public function getInterface(): string
    {
        return MusicOnActionInterface::class;
    }
}