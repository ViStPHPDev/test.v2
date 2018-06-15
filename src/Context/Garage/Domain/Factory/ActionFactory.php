<?php

namespace App\Garage\Domain\Factory;

use App\Garage\Domain\Exception\ActionTypeIncorrectException;
use App\Garage\Domain\Model\Action\ActionInterface;
use App\Garage\Domain\Model\Action\EmptyLoads\EmptyLoadsAction;
use App\Garage\Domain\Model\Action\Fly\FlyAction;
use App\Garage\Domain\Model\Action\Landing\LandingAction;
use App\Garage\Domain\Model\Action\Move\MoveAction;
use App\Garage\Domain\Model\Action\MusicOn\MusicOnAction;
use App\Garage\Domain\Model\Action\Refuel\RefuelAction;
use App\Garage\Domain\Model\Action\Stop\StopAction;
use App\Garage\Domain\Model\Action\Swim\SwimAction;
use App\Garage\Domain\Model\Action\TakeOff\TakeOffAction;

/**
 * Class ActionFactory
 * @package App\Garage\Domain\Factory
 */
final class ActionFactory
{
    const
        ACTION_REFUEL = RefuelAction::class,
        ACTION_STOP = StopAction::class,
        ACTION_MOVE = MoveAction::class,

        ACTION_EMPTY_LOADS = EmptyLoadsAction::class,
        ACTION_MUSIC_ON = MusicOnAction::class,

        ACTION_TAKE_OFF = TakeOffAction::class,
        ACTION_FLY = FlyAction::class,
        ACTION_LANDING = LandingAction::class,

        ACTION_SWIM = SwimAction::class;

    /** @var  array */
    protected static $actions = [];

    /**
     * @param string $type
     * @return ActionInterface
     * @throws ActionTypeIncorrectException
     */
    public static function create(string $type): ActionInterface
    {
        $constants = array_flip((new \ReflectionClass(self::class))->getConstants());
        if (!isset($constants[$type])) {
            throw new ActionTypeIncorrectException();
        }
        if (!isset(self::$actions[$type])) {
            self::$actions[$type] = new $type();
        }
        return self::$actions[$type];
    }

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}