<?php

namespace App\Garage\Domain\Exception;

/**
 * Class ActionTypeIncorrectException
 * @package App\Garage\Domain\Exception
 */
class ActionTypeIncorrectException extends AbstractGarageException
{
    /**
     * ActionTypeIncorrectException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "Action type is incorrect",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}