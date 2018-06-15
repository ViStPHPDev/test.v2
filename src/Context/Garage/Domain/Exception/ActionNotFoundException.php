<?php

namespace App\Garage\Domain\Exception;

/**
 * Class ActionTypeIncorrectException
 * @package App\Garage\Domain\Exception
 */
class ActionNotFoundException extends AbstractGarageException
{
    /**
     * ActionTypeIncorrectException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            "Action not found",
            ResponseExceptionInterface::CODE_SERVER_ERROR
        );
    }
}